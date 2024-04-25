<?php

namespace App\Modules\User\Actions;

use App\Modules\User\Actions\Validation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Store
{
    static $model = \App\Modules\User\Model::class;

    public static function execute(Validation $request)
    {
        try {
            // dd($request->input('user_role_id'));
            $data = $request->validated();
            unset($data['user_role_id']);
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = uploader($image, 'uploads/user');
                $data['image'] = $imageName;
            }
            // dd($data);
            $data['password'] = Hash::make($request->input('password'));
            if (auth()->id() == 7) {
                $data['parent'] = auth()->id();
            }
            if ($userData = self::$model::query()->create($data)) {
                DB::table('user_user_role')->insert([
                    'user_id' => $userData->id,
                    'user_role_id' => $request->input('user_role_id')
                ]);
                return messageResponse('User added successfully', 201);
            }
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
