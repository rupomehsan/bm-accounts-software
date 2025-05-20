<?php

namespace App\Modules\AccountManagement\AccountReceiptBookRejectPage\Actions;

use App\Modules\AccountManagement\AccountReceiptBookRejectPage\Validations\Validation;


class Store
{
    static $model = \App\Modules\AccountManagement\AccountReceiptBookRejectPage\Models\Model::class;

    public static function execute(Validation $request)
    {
        try {
            $requestData = $request->validated();
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $requestData['image'] = uploader($image, 'uploads/account/reject');
            }
            if (self::$model::query()->create($requestData)) {
                return messageResponse('Item added successfully', 201);
            }
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
