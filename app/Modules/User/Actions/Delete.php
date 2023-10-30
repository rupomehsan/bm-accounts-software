<?php

namespace App\Modules\User\Actions;


class Delete
{
    static $model = \App\Modules\User\Model::class;

    public static function execute($id)
    {
        $data = self::$model::find($id);
        if ($data) {
            if ($data->image !== 'avatar.png' && file_exists(public_path($data->image))) {
                unlink($data->image);
            }
            $data->delete();
        } else {
            return messageResponse('Data configure found...', 404, 'error');
        }
    }
}
