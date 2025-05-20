<?php

namespace App\Modules\AssetManagement\Asset\Actions;

use App\Modules\AssetManagement\Asset\Validations\Validation;


class Store
{
    static $model = \App\Modules\AssetManagement\Asset\Models\Model::class;
    static $assetItemModel = \App\Modules\AssetManagement\AssetItem\Models\Model::class;

    public static function execute(Validation $request)
    {
        try {
            // dd($request->all());
            $requestData = $request->validated();
            if ($request->hasFile('asset_image')) {
                $image = $request->file('asset_image');
                $requestData['asset_image'] = uploader($image, 'uploads/asset');
            }
            if ($request->hasFile('voucher_image')) {
                $image = $request->file('voucher_image');
                $requestData['voucher_image'] = uploader($image, 'uploads/asset');
            }
            if ($request->hasFile('acceptance_image')) {
                $image = $request->file('acceptance_image');
                $requestData['acceptance_image'] = uploader($image, 'uploads/asset');
            }
            if ($request->hasFile('cs_quotaiton_image')) {
                $image = $request->file('cs_quotaiton_image');
                $requestData['cs_quotaiton_image'] = uploader($image, 'uploads/asset');
            }
            unset($requestData['asset_categories_id']);

            if ($asset = self::$model::query()->create($requestData)) {
                $asset->asset_item_category()->attach($request->asset_categories_id);
                if (array_key_exists('items', $request->all())) {
                    foreach ($request->items as $item) {

                        $assetItemData = $item;
                        $assetItemData['asset_id'] = $asset->id;
                        if (isset($item['waranty_image'])) {
                            $image = $item['waranty_image'];
                            $assetItemData['waranty_image'] = uploader($image, 'uploads/asset');
                        }
                        if (isset($item['item_image'])) {
                            $image = $item['item_image'];
                            $assetItemData['item_image'] = uploader($image, 'uploads/asset');
                        }
                        self::$assetItemModel::query()->create($assetItemData);
                    }
                }
                return messageResponse('Item added successfully', 201);
            }
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
