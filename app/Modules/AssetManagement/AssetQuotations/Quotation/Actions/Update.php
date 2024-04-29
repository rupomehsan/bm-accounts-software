<?php

namespace App\Modules\AssetManagement\AssetQuotations\Quotation\Actions;

use App\Modules\AssetManagement\AssetQuotations\Quotation\Validations\Validation;

class Update
{
    static $model = \App\Modules\AssetManagement\AssetQuotations\Quotation\Models\Model::class;
    static $quotaionProductModel = \App\Modules\AssetManagement\AssetQuotations\Product\Models\Model::class;
    static $quotaionProductPriceModel = \App\Modules\AssetManagement\AssetQuotations\ProductPrice\Models\Model::class;
    static $shopNameModel = \App\Modules\AssetManagement\AssetShopList\Models\Model::class;

    public static function execute(Validation $request, $id)
    {
        try {



            if (!$data = self::$model::with('quotation_product_price')->where('id', $id)->first()) {
                return messageResponse('Data not found...', 404, 'error');
            }


            $requestData = $request->validated();
            if ($data->update($requestData)) {
                if ($request->product && count($request->product)) {
                    foreach ($request->product as  $value) {

                        $quotationProduct = self::$quotaionProductModel::find($value['product_id']);
                        if ($quotationProduct) {
                            $quotationProduct->update([
                                'title' => $value['product_name'],
                            ]);
                        } else {
                            $quotationProduct =  self::$quotaionProductModel::create([
                                'title' => $value['product_name'],
                                'asset_quotation_id' => $data->id,
                            ]);
                        }

                        if (array_key_exists('details', $value)) {
                            if ($value['details'] && count($value['details'])) {
                                foreach ($value['details'] as $item) {

                                    $quotation_image = null;
                                    if (array_key_exists('quotation_image', $item)) {
                                        $image = $item['quotation_image'];
                                        $quotation_image = uploader($image, 'uploads/asset');
                                    }
                                    $itemData = [
                                        'shope_name' => $item['shope_name'],
                                        'address' => $item['address'],
                                        'shop_contact' => $item['shop_contact'],
                                        'price' => $item['price'],
                                        'qty' => $item['qty'] ?? "",
                                        'brand' => $item['brand'],
                                        'product_id' => $quotationProduct->id,
                                        'asset_quotation_id' => $data->id,
                                    ];
                                    if (array_key_exists('quotation_image', $item)) {
                                        $itemData['quotation_image'] = $quotation_image;
                                    }
                                    if ($item['id']) {
                                        $existItem = self::$quotaionProductPriceModel::find($item['id']);
                                        if ($existItem) {
                                            $existItem->update($itemData);
                                            $assetShopNameExist = self::$shopNameModel::where('shop_name', $itemData['shope_name'])->first();
                                            if (!$assetShopNameExist) {
                                                self::$shopNameModel::create([
                                                    'shop_name' => $itemData['shope_name'] ?? "",
                                                    'contact_number_1' => $itemData['shop_contact'] ?? "",
                                                ]);
                                            }
                                        }
                                    } else {
                                        self::$quotaionProductPriceModel::create($itemData);
                                        $assetShopNameExist = self::$shopNameModel::where('shop_name', $itemData['shope_name'])->first();
                                        if (!$assetShopNameExist) {
                                            self::$shopNameModel::create([
                                                'shop_name' => $itemData['shope_name'] ?? "",
                                                'contact_number_1' => $itemData['shop_contact'] ?? "",
                                            ]);
                                        }
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
