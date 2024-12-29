<?php

namespace App\Modules\CpApplicationCategory\Actions;

class Delete
{
    static $model = \App\Modules\CpApplicationCategory\Model::class;
    static $applicationModel = \App\Modules\CpApplication\Model::class;

    public static function execute($id)
    {
        try {
            if (!$data = self::$model::find($id)) {
                return messageResponse('Data not found...', 404, 'error');
            }
            $application = self::$applicationModel::where('cp_application_category_id', $id)->first();
            if ($application) {
                $data->status = 'inactive';
                $data->update();
            } else {
                $data->delete();
            }
            return messageResponse('Item successfully deleted', 200, 'success');
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
