<?php

namespace App\Modules\AssetManagement\AssetQuotations\Quotation\Actions;

use App\Modules\AssetManagement\AssetQuotations\Quotation\Validations\Validation;


class Store
{
    static $model = \App\Modules\AssetManagement\AssetQuotations\Quotation\Models\Model::class;
    static $quotaionProductModel = \App\Modules\AssetManagement\AssetQuotations\Product\Models\Model::class;
    static $quotaionProductPriceModel = \App\Modules\AssetManagement\AssetQuotations\ProductPrice\Models\Model::class;
    static $shopNameModel = \App\Modules\AssetManagement\AssetShopList\Models\Model::class;

    public static function execute(Validation $request)
    {
        try {

            $quotationData = $request->validated();

            if ($quotation = self::$model::query()->create($quotationData)) {


                if ($request->product && count($request->product)) {
                    foreach ($request->product as  $value) {
                        $quotationProduct = self::$quotaionProductModel::create([
                            'title' => $value['product_name'] ?? "",
                            'asset_quotation_id' => $quotation->id,
                        ]);

                        if (array_key_exists('details', $value)) {
                            if ($value['details'] && count($value['details'])) {
                                foreach ($value['details'] as $item) {
                                    $quotation_image = null;
                                    if (array_key_exists('quotation_image', $item)) {
                                        $image = $item['quotation_image'];
                                        $quotation_image = uploader($image, 'uploads/asset');
                                    }
                                    self::$quotaionProductPriceModel::create([
                                        'shope_name' => $item['shope_name'] ?? "",
                                        'address' => $item['address'] ?? "",
                                        'shop_contact' => $item['shop_contact'] ?? "",
                                        'price' => $item['price'] ?? "",
                                        'qty' => $item['qty'] ?? "",
                                        'quotation_image' => $quotation_image,
                                        'brand' => $item['brand'] ?? "",
                                        'product_id' => $quotationProduct->id,
                                        'asset_quotation_id' => $quotation->id,
                                    ]);
                                    $assetShopNameExist = self::$shopNameModel::where('shop_name', $item['shope_name'])->first();
                                    if (!$assetShopNameExist) {
                                        self::$shopNameModel::create([
                                            'shop_name' => $item['shope_name'] ?? "",
                                            'contact_number_1' => $item['shop_contact'] ?? "",
                                        ]);
                                    }
                                }
                            }
                        }
                    }
                }
                return messageResponse('Item added successfully', 201);
            }
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
