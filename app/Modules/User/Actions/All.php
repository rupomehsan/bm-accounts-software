<?php

namespace App\Modules\User\Actions;

use Illuminate\Support\Facades\DB;

class All
{
    static $model = \App\Modules\User\Model::class;

    public static function execute()
    {
        try {
            // dd(request()->all());
            $offset = request()->input('offset') ?? 10;
            $condition = [];
            $with = [];
            $data = self::$model::query();
            if (request()->has('status') && request()->input('status')) {
                $condition['status'] = request()->input('status');
            }

            if (request()->has('branch_user') && request()->input('branch_user')) {
                $data->whereExists(function ($query) {
                    $query->select(DB::raw(1))
                        ->from('user_user_role')
                        ->whereColumn('user_user_role.user_id', 'users.id')
                        ->where('user_user_role.user_role_id', 10);
                });
            }


            if (request()->has('search') && request()->input('search')) {
                $data = $data->where('full_name', 'like', '%' . request()->input('search') . '%');
            }

            if (request()->has('get_all') && (int)request()->input('get_all') === 1) {
                $data = $data->with($with)->where($condition)->latest()->get();
            } else {
                $data = $data->with($with)->where($condition)->latest()->paginate($offset);
            }
            return entityResponse($data);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
