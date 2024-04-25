<?php

namespace App\Modules\AssetManagement\Asset\Actions;

use Illuminate\Support\Facades\DB;

class All
{
    static $model = \App\Modules\AssetManagement\Asset\Models\Model::class;

    public static function execute()
    {
        try {
            // dd(request()->all());
            $offset = request()->input('offset') ?? 10;
            $condition = [];
            $with = ['asset_audit_list'];
            $data = self::$model::query();
            if (request()->has('status') && request()->input('status')) {
                $condition['status'] = request()->input('status');
            }


            if (request()->has('search') && request()->input('search')) {
                $data = $data->where('title', 'like', '%' . request()->input('search') . '%');
            }

            if (request()->has('get_all') && (int)request()->input('get_all') === 1) {
                $data = $data->with($with)->where($condition)->latest()->get();
            } else {
                if (request()->has('withoutaudit') && request()->input('withoutaudit')) {
                    $assetAudit = $data
                        ->whereHas('asset_audit_list', function ($query) {
                            $query->where('asset_audit_id', request()->asset_audit_id);
                        })
                        ->pluck('id');
                    $data = self::$model::whereNotIn('id', $assetAudit)->with($with)->where($condition)->latest()->paginate($offset);
                    $response =  [
                        "data" => $data,
                        'totalAssets' => self::$model::count(),
                        'totalAudited' => $assetAudit->count()
                    ];
                    return entityResponse($response);
                }
                if (request()->has('withaudit') && request()->input('withaudit')) {
                    $data = $data
                        ->whereHas('asset_audit_list', function ($query) {
                            $query->where('asset_audit_id', request()->asset_audit_id);
                        })->with($with)->where($condition)->latest()->paginate($offset);


                    $response =  [
                        "data" => $data,
                        'totalAssets' => self::$model::count(),
                        'totalAudited' => $data->count()
                    ];
                    return entityResponse($response);
                }

                $data = $data->with($with)->where($condition)->latest()->paginate($offset);
            }
            return entityResponse($data);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
