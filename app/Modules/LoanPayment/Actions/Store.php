<?php

namespace App\Modules\LoanPayment\Actions;

use App\Modules\LoanPayment\Actions\Validation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class Store
{
    static $model = \App\Modules\LoanPayment\Model::class;
    static $loanRegisterModel = \App\Modules\LoanProvider\Model::class;
    static $userModel = \App\Modules\User\Model::class;
    static $accountLogModel = \App\Modules\AccountManagement\AccountLog\Model::class;

    public static function execute(Validation $request)
    {
        try {
            $data = $request->validated();
            $loanRegister = self::$loanRegisterModel::where('user_id', $data['user_id'])->where('id', $data['loan_provide_id'])->first();



            // if ($data['amount'] < $loanRegister->due_amount) {
            //     $data['due'] = $loanRegister->due_amount - $data['amount'];
            //     $data['payment_status'] = 'Due';
            //     $loanRegister->due_amount =  $data['due'];
            // }

            // if ($data['amount'] >= $loanRegister->due_amount) {
            //     $data['due'] = $loanRegister->due_amount - $data['amount'];
            //     $data['payment_status'] = 'paid';
            //     $loanRegister->payment_status = 'paid';
            //     $loanRegister->due_amount =  $data['due'];
            // }

            $data['category_id'] = $loanRegister->category_id;

            // dd($loanRegister);

            if ($request->hasFile('attachment')) {
                $image = $request->file('attachment');
                $imageName = uploader($image, 'uploads/loan');
                $data['attachment'] = $imageName;
            }

            if ($loanPayment = self::$model::query()->create($data)) {
                $totalGiven = self::$model::where('user_id', $data['user_id'])
                    ->where('category_id', $loanPayment->category_id)
                    ->sum('amount');
                $loanPayment->due_amount = $loanRegister->due_amount =  $loanRegister->amount - $totalGiven;
                $loanRegister->total_paid = $totalGiven;
                
                $user = self::$userModel::find($request->user_id);
                $logData = [
                    'user_id' => $request->user_id,
                    'user_type' =>  $user->roles[0]->name,
                    'name' =>  $user->full_name,
                    'date' => Carbon::now(),
                    'amount' => $request->amount,
                    'category_id' => $loanRegister->category_id,
                    'is_income' => 1,
                ];
                $accLog = self::$accountLogModel::create($logData);
                $loanPayment->account_log_id = $accLog->id;
                $loanPayment->update();
                $loanRegister->update();
                return messageResponse('Loan payment added successfully', 201);
            }
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
