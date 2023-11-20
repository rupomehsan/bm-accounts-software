<?php

namespace App\Modules\UserNotification\Actions;

use App\Modules\UserNotification\Actions\Validation;
use Illuminate\Support\Facades\Hash;

class Store
{
    static $model = \App\Modules\UserNotification\Model::class;

    public static function execute(Validation $request)
    {
        // dd(request()->all());
        try {

            $users = json_decode($request->input('user_id'));
            foreach ($users as $user) {
                $data = array_merge($request->validated(), ['user_id' => $user]);
                self::$model::query()->create($data);
            }
            return messageResponse('Notification send successfully', 201);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
