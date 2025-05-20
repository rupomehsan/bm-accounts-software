<?php

namespace App\Modules\AssetManagement\AssetQuotations\ProductPrice\Actions;

class Delete
{
    static $model = \App\Modules\AssetManagement\AssetQuotations\ProductPrice\Models\Model::class;
    static $productModel = \App\Modules\AssetManagement\AssetQuotations\Product\Models\Model::class;

    public static function execute($id)
    {
        try {
            if (!$data = self::$model::find($id)) {
                return messageResponse('Data not found...', 404, 'error');
            }
            if ($data->delete()) {
                $count = self::$model::where('product_id', $data->product_id)->count();
                if ($count == 0) {
                    self::$productModel::find($data->product_id)->delete();
                }
            }

            return messageResponse('Item Successfully deleted', 200, 'success');
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
