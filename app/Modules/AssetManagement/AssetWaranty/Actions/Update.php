<?php

namespace App\Modules\AssetManagement\AssetWaranty\Actions;

use App\Modules\AssetManagement\AssetWaranty\Validations\Validation;

class Update
{
    static $model = \App\Modules\AssetManagement\AssetWaranty\Models\Model::class;

    public static function execute(Validation $request, $id)
    {
        try {
            if (!$data = self::$model::query()->where('id', $id)->first()) {
                return messageResponse('Data not found...', 404, 'error');
            }
            $requestData = $request->validated();
            if ($request->hasFile('waranty_card_image')) {
                $image = $request->file('waranty_card_image');
                $requestData['waranty_card_image'] = uploader($image, 'uploads/asset');
            }
            $data->update($requestData);
            return messageResponse('Item updated successfully');
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
