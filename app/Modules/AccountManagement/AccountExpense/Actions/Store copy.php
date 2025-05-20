<?php

namespace App\Modules\AccountManagement\AccountExpense\Actions;

use App\Modules\AccountManagement\AccountExpense\Actions\Validation;
use Illuminate\Support\Facades\Hash;
use App\Modules\AccountManagement\AccountLog\Actions\Store as LogStore;

class Store
{
    static $model = \App\Modules\AccountManagement\AccountExpense\Model::class;
    static $supportVoucermodel = \App\Modules\AccountManagement\AccountExpense\SupportModel::class;
    static $supportVoucerImagemodel = \App\Modules\AccountManagement\AccountExpense\SupportImageModel::class;

    public static function execute(Validation $request)
    {
        try {
            if ($request->input('support_voucher')) {
                $support_voucher = $request->support_voucher;
                foreach ($support_voucher as $index => $item) {
                    if ($item['amount'] == null && !array_key_exists('image', $item)) {
                        return [
                            'status' => 'support_voucher_error',
                            "index" => $index,
                        ];
                    }
                    if ($item['amount'] == null) {
                        return [
                            'status' => 'support_voucher_error',
                            "index" => $index,
                        ];
                    }

                    if (!array_key_exists('image', $item)) {
                        return messageResponse('Sorry, Image must be required...', 404, 'error');
                    }
                }
            }

            $accountExpense = self::$model::create([
                "department_id" => auth()->id(),
                "account_expense_category_id" => $request->input('account_expense_category_id'),
                "date" => $request->input('date'),
                "folio" => $request->input('folio')
            ]);

            if ($accountExpense) {
                $supprotVoucehData = $request->support_voucher;

                foreach ($supprotVoucehData as $item) {
                    $image = $item['image'];
                    $imageUrl = uploader($image, 'uploads/voucher');
                    $supportImage =  self::$supportVoucerImagemodel::create([
                        'url' => $imageUrl
                    ]);
                    self::$supportVoucermodel::create([
                        "expense_id" => $accountExpense->id,
                        "approved_by_admin" => auth()->user()->roles[0]->serial == 7 ? 1 : 0,
                        "approved_by_bm" => auth()->user()->roles[0]->serial == 5 ? 1 : 0,
                        "department_id" => $accountExpense->department_id,
                        "amount" => $item['amount'],
                        "image_id" => $supportImage->id,
                    ]);
                }

                $amount = self::$supportVoucermodel::where('expense_id', $accountExpense->id)->sum('amount');
                $accountExpense->amount = $amount;
                $accountExpense->update();

                $data = [
                    "user_id" => auth()->id(),
                    "user_type" => auth()->user()->roles[0]->name ?? '',
                    "date" => $accountExpense->date,
                    "name" => auth()->user()->full_name ?? "",
                    "amount" => $accountExpense->amount,
                    "category_id" => $accountExpense->account_expense_category_id,
                    "account_id" => null,
                    "account_number_id" => null,
                    "trx_id" =>  null,
                    "receipt_no" => null,
                    "is_income" => 0,
                    "is_expense" => 1,
                    "description" => '',
                    "random_user" => '',
                ];

                $logInfor =  LogStore::execute($data);
                $accountExpense->account_log_id = $logInfor->id;
                $accountExpense->update();
            }

            return messageResponse('Item added successfully', 201);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
