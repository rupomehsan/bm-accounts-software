<?php

namespace App\Modules\AssetManagement\Asset\Actions;

use App\Modules\AssetManagement\Asset\Validations\Validation;

class Update
{
    static $model = \App\Modules\AssetManagement\Asset\Models\Model::class;
    static $assetItemModel = \App\Modules\AssetManagement\AssetItem\Models\Model::class;
    public static function execute(Validation $request, $id)
    {
        try {
            if (!$data = self::$model::query()->where('id', $id)->first()) {
                return messageResponse('Data not found...', 404, 'error');
            }

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
            if ($data->update($requestData)) {
                $data->asset_item_category()->sync($request->asset_categories_id);
                if (array_key_exists('items', $request->all())) {
                    foreach ($request->items as $item) {
                        $assetItemData = $item;
                        // dd($item);
                        if (isset($item['waranty_image'])) {
                            $image = $item['waranty_image'];
                            $assetItemData['waranty_image'] = uploader($image, 'uploads/asset');
                        }
                        if (isset($item['item_image'])) {
                            $image = $item['item_image'];
                            $assetItemData['item_image'] = uploader($image, 'uploads/asset');
                        }
                        if ($existAssetItem = self::$assetItemModel::find($item['id'])) {
                            $existAssetItem->update($assetItemData);
                        } else {
                            $assetItemData['asset_id'] = $id;
                            self::$assetItemModel::query()->create($assetItemData);
                        }
                    }
                }
                return messageResponse('Item updated successfully');
            }
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
