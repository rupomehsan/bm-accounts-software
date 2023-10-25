<?php

namespace App\Api\User\Actions;

use App\Api\User\Actions\Validation;
use Illuminate\Support\Facades\Hash;

class Update
{
    static $model = \App\Api\User\Model::class;

    public static function exec(Validation $request, $id)
    {

        try {
            dd($request->all());
            $imageName = 'avatar.png';
            if ($request->file('image')) {
                $image = $request->file('image');
                $imageName = image_uploader($image, 'uploads/user');
            }
            // dd($imageName);
            if (self::$model::query()->create(array_merge(
                $request->validated(),
                [
                    'image' => $imageName,
                    'password' => Hash::make($request->input('password'))
                ]
            ))) {
                return messageResponse('User added successfully', 201);
            }
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
