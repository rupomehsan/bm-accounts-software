<?php

namespace App\Modules\AssetManagement\AssetRequestToCp\Actions;

use App\Modules\AssetManagement\AssetRequestToCp\Validations\Validation;

class Update
{
    static $model = \App\Modules\AssetManagement\AssetRequestToCp\Models\Model::class;

    public static function execute(Validation $request, $id)
    {
        try {
            if (!$data = self::$model::query()->where('id', $id)->first()) {
                return messageResponse('Data not found...', 404, 'error');
            }
            $requestData = $request->validated();
            if ($request->hasFile('quotation_image')) {
                $image = $request->file('quotation_image');
                $requestData['quotation_image'] = uploader($image, 'uploads/asset');
            }
            $data->update($requestData);
            return messageResponse('Item updated successfully');
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
    public static function assetQuotationApproval()
    {
        try {
            if (!$data = self::$model::query()->where('id', request()->id)->first()) {
                return messageResponse('Data not found...', 404, 'error');
            }
            $data->is_approved = request()->is_approved;
            $data->update();
            return messageResponse('Item updated successfully');
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
