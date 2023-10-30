<?php

namespace App\Modules\User\Actions;

use App\Modules\User\Actions\Validation;
use Illuminate\Support\Facades\Hash;

class Update
{
    static $model = \App\Modules\User\Model::class;

    public static function execute(Validation $request, $id)
    {

        try {
            // dd(request()->all());
            if (!$query = self::$model::query()->where('id', $id)->first()) {
                return messageResponse('Data not found...', 404, 'error');
            }

            $data = $request->validated();

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = uploader($image, 'uploads/user');
                $data['image'] = $imageName;
            } else {
                $data['image'] = $query->image;
            }

            $query->update($data);

            return messageResponse('User updated successfully');
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
