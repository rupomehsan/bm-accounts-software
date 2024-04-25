<?php

namespace App\Modules\AssetManagement\AssetQuotations\Quotation\Actions;



class Show
{
    static $model = \App\Modules\AssetManagement\AssetQuotations\Quotation\Models\Model::class;
    static $assetRequestToCpModel = \App\Modules\AssetManagement\AssetRequestToCp\Models\Model::class;

    public static function execute($id)
    {
        try {
            $with = ['quotation_product_price.product'];
            if (!$data = self::$model::query()->with($with)->where('id', $id)->first()) {
                return messageResponse('Data not found...', 404, 'error');
            }
            return entityResponse($data);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
    public static function assetQuotationDetatilsByCpRequestId($id)
    {
        try {
            $with = ['quotation_product_price.product'];
            $reqeustAssetqQuotation = self::$assetRequestToCpModel::find($id);
            if ($reqeustAssetqQuotation) {
                if (!$data = self::$model::query()->with($with)->where('id', $reqeustAssetqQuotation->asset_quotation_id)->first()) {
                    return messageResponse('Data not found...', 404, 'error');
                }
                $response = [
                    "reqeustAssetqQuotation" =>  $reqeustAssetqQuotation,
                    'data' => $data
                ];
                return entityResponse($response);
            }
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
