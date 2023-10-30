<?php

namespace App\Modules\User\Actions;

use App\Modules\User\Actions\Validation;
use Illuminate\Support\Facades\Hash;

class Store
{
    static $model = \App\Modules\User\Model::class;

    public static function execute(Validation $request)
    {
        try {
            $data = $request->validated();
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = uploader($image, 'uploads/user');
                $data['image'] = $imageName;
            }

            // dd($data);

            $data['password'] = Hash::make($request->input('password'));
            if (self::$model::query()->create($data)) {
                return messageResponse('User added successfully', 201);
            }
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
