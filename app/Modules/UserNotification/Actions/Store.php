<?php

namespace App\Modules\UserNotification\Actions;

use App\Modules\UserNotification\Actions\Validation;
use Illuminate\Support\Facades\Hash;

class Store
{
    static $model = \App\Modules\UserNotification\Model::class;
    static $userModel = \App\Modules\User\Model::class;

    public static function execute(Validation $request)
    {
        // dd(request()->all());
        try {

            if (array_key_exists("to_all", $request->validated())) {
                $data = array_merge($request->validated(), ['to_all' => 1, 'user_id' => null]);
                self::$model::query()->create($data);
                $teleUser = self::$userModel::all();
                foreach ($teleUser as $user) {
                    sendToTelegram($user->telegram_id, $request->input('description'));
                }
            } else {
                $users = json_decode($request->input('user_id'));
                $department = json_decode($request->input('department'));
                $users = array_merge($users, $department);
                foreach ($users as $user) {
                    $data = array_merge($request->validated(), ['user_id' => $user, 'to_all' => 0]);
                    self::$model::query()->create($data);
                    $teleUser = self::$userModel::where('id', $user)->first();
                    if ($teleUser) {
                        sendToTelegram($teleUser->telegram_id, $request->input('description'));
                    }
                }
            }

            return messageResponse('Notification send successfully', 201);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
