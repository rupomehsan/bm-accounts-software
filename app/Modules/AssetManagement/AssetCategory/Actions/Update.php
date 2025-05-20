<?php

namespace App\Modules\AssetManagement\AssetCategory\Actions;

use App\Modules\AssetManagement\AssetCategory\Validations\Validation;
use Illuminate\Support\Facades\Storage;

class Update
{
    static $model = \App\Modules\AssetManagement\AssetCategory\Models\Model::class;

    public static function execute(Validation $request, $id)
    {
        try {
            if (!$data = self::$model::query()->where('id', $id)->first()) {
                return messageResponse('Data not found...', 404, 'error');
            }
            $requestData = $request->validated();
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $requestData['image'] = uploader($image, 'uploads/asset/category');
            }
            $data->update($requestData);
            return messageResponse('Item updated successfully');
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
