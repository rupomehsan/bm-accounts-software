<?php

namespace App\Modules\LoanProvider\Actions;

use App\Modules\LoanProvider\Actions\Validation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class Store
{
    static $model = \App\Modules\LoanProvider\Model::class;
    static $userModel = \App\Modules\User\Model::class;
    static $accountLogModel = \App\Modules\AccountManagement\AccountLog\Model::class;
    static $accountCategoryModel = \App\Modules\AccountManagement\AccountCategory\Model::class;

    public static function execute(Validation $request)
    {
        try {
            $data = $request->validated();

            $category_id = self::$accountCategoryModel::where('title', 'ঋণ প্রদান')->first();
            $data['category_id'] = $category_id->id ?? 54;
            $data['given_by'] = auth()->id();
            $data['due_amount'] = $data['amount'];
            if ($request->hasFile('attachment')) {
                $image = $request->file('attachment');
                $imageName = uploader($image, 'uploads/loan');
                $data['attachment'] = $imageName;
            }
            $accoutntCategory = self::$accountCategoryModel::where('title', 'ঋণ ডিলিট')->first();
            if ($loanProvide = self::$model::query()->create($data)) {
                $user = self::$userModel::find($request->user_id);
                $voucherData = [
                    "user_id" => $request->user_id,
                    "user_type" => $user->roles[0]->name,
                    "date" =>  $request->taken_date,
                    "name" => $user->name,
                    "amount" => $request->amount,
                    "category_id" => $accoutntCategory->id,
                    "creator" => auth()->id(),
                    'description' => "Account balance for loan  added, related log id: " . $loanProvide->account_log_id,
                    'is_income' => 0,
                    'is_expense' => 1,
                    'account_id' => $request->account_id,
                    'account_number_id' => $request->account_number_id,
                ];

                $accLog = logEntry($voucherData);
                $loanProvide->account_log_id = $accLog->id;
                $loanProvide->update();
                return messageResponse('Loan added successfully', 201);
            }
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
