<?php

namespace App\Modules\JamanotProvider\Actions;

use App\Modules\JamanotProvider\Actions\Validation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class Store
{
    static $model = \App\Modules\JamanotProvider\Model::class;
    static $userModel = \App\Modules\User\Model::class;
    static $accountLogModel = \App\Modules\AccountManagement\AccountLog\Model::class;
    static $accountCategoryModel = \App\Modules\AccountManagement\AccountCategory\Model::class;

    public static function execute(Validation $request)
    {
        try {
            $data = $request->validated();
            $category_id = self::$accountCategoryModel::where('title', 'জামানত')->first();
            $data['category_id'] = $category_id->id ?? 54;
            $data['given_by'] = auth()->id();
            if ($request->hasFile('attachment')) {
                $image = $request->file('attachment');
                $imageName = uploader($image, 'uploads/jamanot');
                $data['attachment'] = $imageName;
            }
            if ($loanProvide = self::$model::query()->create($data)) {
                $user = self::$userModel::find($request->user_id);
                $logData = [
                    'user_id' => $request->user_id,
                    'user_type' =>  $user->roles[0]->name,
                    'name' =>  $user->full_name,
                    'date' => Carbon::now(),
                    'amount' => $request->amount,
                    'category_id' => $request->category_id,
                    'is_expense' => 1,
                ];
                $accLog = self::$accountLogModel::create($logData);
                $loanProvide->account_log_id = $accLog->id;
                $loanProvide->update();
                return messageResponse('Loan added successfully', 201);
            }
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
