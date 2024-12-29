<?php

namespace App\Modules\AssetManagement\AssetQuotations\Quotation\Actions;

class Delete
{
    static $model = \App\Modules\AssetManagement\AssetQuotations\Quotation\Models\Model::class;
    static $quotaionProductModel = \App\Modules\AssetManagement\AssetQuotations\Product\Models\Model::class;
    static $quotaionProductPriceModel = \App\Modules\AssetManagement\AssetQuotations\ProductPrice\Models\Model::class;

    public static function execute($id)
    {
        try {
            if (!$data = self::$model::find($id)) {
                return messageResponse('Data not found...', 404, 'error');
            }

            if ($data->delete()) {
                $quotationProduct = self::$quotaionProductModel::where('asset_quotation_id', $id)->first();
                if ($quotationProduct) {
                    $quotationProduct->delete();
                }
                $quotationProductPrice = self::$quotaionProductPriceModel::where('asset_quotation_id', $id)->get();
                if ($quotationProductPrice && count($quotationProductPrice)) {
                    foreach ($quotationProductPrice as $key => $value) {
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
