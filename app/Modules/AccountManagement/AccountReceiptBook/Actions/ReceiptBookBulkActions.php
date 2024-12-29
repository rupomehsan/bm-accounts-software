<?php

namespace App\Modules\AccountManagement\AccountReceiptBook\Actions;

use App\Modules\AccountManagement\AccountReceiptBook\Actions\Validation;

class ReceiptBookBulkActions
{
    static $model = \App\Modules\AccountManagement\AccountReceiptBook\Model::class;

    public static function execute()
    {
        try {
            // dd(request()->all());
            $ids = json_decode(request()->ids);

            foreach ($ids as $id) {
                if (!$data = self::$model::query()->where('id', $id)->first()) {
                    return messageResponse('Data not found...', 404, 'error');
                }
                $data->update(['is_approvel' => request()->action == 'approved' ? 1 : 0]);
            }

            return messageResponse('Items updated successfully');

        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }

}
