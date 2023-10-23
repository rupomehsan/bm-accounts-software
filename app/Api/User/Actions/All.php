<?php

namespace App\Api\User\Actions;


class All
{
    static $model = \App\Api\User\Model::class;

    public static function exec()
    {
        $data = self::$model::get();
        return $data;
    }
}
