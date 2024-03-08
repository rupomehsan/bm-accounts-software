<?php

namespace App\Modules\OfficeRent\Actions;

use App\Modules\OfficeRent\Actions\Validation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class Store
{
    static $model = \App\Modules\OfficeRent\Model::class;
    static $userModel = \App\Modules\User\Model::class;
    static $accountLogModel = \App\Modules\AccountManagement\AccountLog\Model::class;
    static $accountCategoryModel = \App\Modules\AccountManagement\AccountCategory\Model::class;


    public static function execute(Validation $request)
    {
        try {
            if ($data = self::$model::query()->create($request->validated())) {
                $user = self::$userModel::find($request->user_id);
                $category_id = self::$accountCategoryModel::where('title', 'অফিস ভাড়া')->first();

                $logData = [
                    'user_id' => $request->user_id,
                    'user_type' =>  $user->roles[0]->name,
                    'name' =>  $user->full_name,
                    'date' => Carbon::now(),
                    'amount' => $request->amount,
                    'category_id' => $category_id->id,
                    'is_expense' => 1,
                ];
                $accLog = self::$accountLogModel::create($logData);
                $data->account_log_id = $accLog->id;
                $data->update();
                return messageResponse('Item added successfully', 201);
            }
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
