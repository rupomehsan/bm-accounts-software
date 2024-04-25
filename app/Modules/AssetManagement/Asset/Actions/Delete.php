<?php

namespace App\Modules\AssetManagement\Asset\Actions;

class Delete
{
    static $model = \App\Modules\AssetManagement\Asset\Models\Model::class;
    static $assetItemModel = \App\Modules\AssetManagement\AssetItem\Models\Model::class;

    public static function execute($id)
    {
        try {
            if (!$data = self::$model::find($id)) {
                return messageResponse('Data not found...', 404, 'error');
            }
            if ($data->delete()) {
                $assetItems = self::$assetItemModel::where('asset_id', $id)->get();
                if ($assetItems && count($assetItems) > 0) {
                    foreach ($assetItems as $key => $value) {
                        $value->delete();
                    }
                }
            }
            return messageResponse('Item Successfully deleted', 200, 'success');
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
