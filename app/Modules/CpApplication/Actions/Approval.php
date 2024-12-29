<?php

namespace App\Modules\CpApplication\Actions;

use App\Modules\CpApplication\Actions\Validation;
use Illuminate\Support\Facades\Hash;

class Approval
{
    static $model = \App\Modules\CpApplication\Model::class;

    public static function execute()
    {
        try {
            // dd(request()->all());
            if (!$data = self::$model::query()->where('id', request()->input('id'))->first()) {
                return messageResponse('Data not found...', 404, 'error');
            }

            $data->update(request()->all());
            return messageResponse('Application updated successfully');
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
