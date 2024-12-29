<?php

namespace App\Modules\JamanotProvider\Actions;



class Show
{
    static $model = \App\Modules\JamanotProvider\Model::class;

    public static function execute($id)
    {
        try {

            $with = [];

            if (request()->input('multiple') == 'true') {
                if (!$data = self::$model::query()->with($with)->where('user_id', $id)->get()) {
                    return messageResponse('Data not found...', 404, 'error');
                }
                return entityResponse($data);
            }

            if (!$data = self::$model::query()->with($with)->where('id', $id)->first()) {
                return messageResponse('Data not found...', 404, 'error');
            }


            return entityResponse($data);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
