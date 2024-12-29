<?php

namespace App\Modules\UserNotification\Actions;

class Delete
{
    static $model = \App\Modules\UserNotification\Model::class;

    public static function execute($id)
    {
        try {
            if ($id !== "null") {
                if (!$data = self::$model::find($id)) {
                    return messageResponse('Data not found...', 404, 'error');
                }
                $data->delete();
                return messageResponse('Item Successfully deleted', 200, 'success');
            } else {
                $items = explode(',', request()->input('items'));
                foreach ($items as  $item) {
                    if (!$data = self::$model::find($item)) {
                        return messageResponse('Data not found...', 404, 'error');
                    }
                    $data->delete();
                }
                return messageResponse('Items Successfully deleted', 200, 'success');
            }
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
