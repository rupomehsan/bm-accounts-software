<?php

namespace App\Modules\AssetManagement\Asset\Actions;



class Show
{
    static $model = \App\Modules\AssetManagement\Asset\Models\Model::class;

    public static function execute($id)
    {
        try {
            $with = ['asset_items','asset_item_category'];
            if (!$data = self::$model::query()->with($with)->where('id', $id)->first()) {
                return messageResponse('Data not found...', 404, 'error');
            }
            return entityResponse($data);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
    public static function showDetails($id)
    {
        try {
            $with = ['asset_request_to_cp', 'asset_lost', 'asset_items', 'asset_transfer.receiver:id,full_name', 'asset_transfer.sender:id,full_name', 'asset_audit_list.asset_audit'];
            if (!$data = self::$model::query()->with($with)->where('id', $id)->first()) {
                return messageResponse('Data not found...', 404, 'error');
            }
            return entityResponse($data);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
