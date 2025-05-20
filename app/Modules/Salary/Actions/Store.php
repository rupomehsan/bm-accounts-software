<?php

namespace App\Modules\Salary\Actions;

use App\Modules\Salary\Actions\Validation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class Store
{
    static $model = \App\Modules\Salary\Model::class;
    static $userModel = \App\Modules\User\Model::class;
    static $accountLogModel = \App\Modules\AccountManagement\AccountLog\Model::class;

    public static function execute(Validation $request)
    {
        try {
            $data = $request->validated();
            $data['given_by'] = auth()->id();
            if ($request->hasFile('attachment')) {
                $image = $request->file('attachment');
                $imageName = uploader($image, 'uploads/salary');
                $data['attachment'] = $imageName;
            }
            // dd($data);
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
