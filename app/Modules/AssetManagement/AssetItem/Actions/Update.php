<?php

namespace App\Modules\AssetManagement\AssetItem\Actions;

use App\Modules\AssetManagement\AssetItem\Validations\Validation;

class Update
{
    static $model = \App\Modules\AssetManagement\AssetItem\Models\Model::class;

    public static function execute(Validation $request, $id)
    {
        try {
            if (!$data = self::$model::query()->where('id', $id)->first()) {
                return messageResponse('Data not found...', 404, 'error');
            }
            $requestData = $request->validated();
            if ($request->hasFile('waranty_image')) {
                $image = $request->file('waranty_image');
                $requestData['waranty_image'] = uploader($image, 'uploads/asset');
            }
            if ($request->hasFile('item_image')) {
                $image = $request->file('item_image');
                $requestData['item_image'] = uploader($image, 'uploads/asset');
            }
            $data->update($requestData);
            return messageResponse('Item updated successfully');
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
