<?php

namespace App\Modules\AssetManagement\AssetCategory\Actions;

use App\Modules\AssetManagement\AssetCategory\Validations\Validation;
use Illuminate\Support\Facades\Storage;

class Store 
{
    static $model = \App\Modules\AssetManagement\AssetCategory\Models\Model::class;

    public static function execute(Validation $request)
    {
        try {
            $requestData = $request->validated();
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $requestData['image'] = uploader($image, 'uploads/asset/category');
            }
            if (self::$model::query()->create($requestData)) {
                return messageResponse('Item added successfully', 201);
            }
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
