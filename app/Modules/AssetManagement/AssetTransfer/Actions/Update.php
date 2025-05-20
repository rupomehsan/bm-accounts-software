<?php

namespace App\Modules\AssetManagement\AssetTransfer\Actions;

use App\Modules\AssetManagement\AssetTransfer\Validations\Validation;
use Carbon\Carbon;

class Update
{
    static $model = \App\Modules\AssetManagement\AssetTransfer\Models\Model::class;

    public static function execute(Validation $request, $id)
    {
        try {
            if (!$data = self::$model::query()->where('id', $id)->first()) {
                return messageResponse('Data not found...', 404, 'error');
            }
            $requestData = $request->validated();
            $data->update($requestData);
            return messageResponse('Item updated successfully');
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
    public static function branchApproval()
    {
        try {
            // dd(request()->all());
            if (!request()->is_approved) {
                return messageResponse('please select status', 404, 'error');
            }

            if (!$data = self::$model::query()->where('id', request()->id)->first()) {
                return messageResponse('Data not found...', 404, 'error');
            }
            $data->update([
                'is_accepted_by_receiver' => request()->is_approved,
                'accepted_date' => Carbon::now()
            ]);

            return messageResponse('Item updated successfully');
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
