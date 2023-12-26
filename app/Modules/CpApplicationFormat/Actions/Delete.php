<?php

namespace App\Modules\CpApplicationFormat\Actions;

class Delete
{
    static $model = \App\Modules\CpApplicationFormat\Model::class;

    public static function execute($id)
    {
        try {
            if (!$data = self::$model::where('cp_application_category_id', $id)->get()) {
                return messageResponse('Data not found...', 404, 'error');
            }
            
            foreach ($data as $value) {
                $value->delete();
            }

            return messageResponse('Item successfully deleted', 200, 'success');
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
