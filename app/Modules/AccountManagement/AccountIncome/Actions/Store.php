<?php

namespace App\Modules\AccountManagement\AccountIncome\Actions;

use App\Models\TargetMoukuf;
use App\Modules\AccountManagement\AccountIncome\Actions\Validation;
use App\Modules\AccountManagement\AccountLog\Actions\Store as LogStore;


class Store
{
    static $model = \App\Modules\AccountManagement\AccountIncome\Model::class;
    static $accountLogModel = \App\Modules\AccountManagement\AccountLog\Model::class;
    static $userModel = \App\Modules\User\Model::class;
    static $applicationModel = \App\Modules\CpApplication\Model::class;
    static $receiptBookModel = \App\Modules\AccountManagement\AccountReceiptBook\Model::class;
    public static function execute(Validation $request)
    {
        try {



            if (self::$model::query()->where('account_receipt_book_id', $request->input('account_receipt_book_id'))->where('account_receipt_no', $request->input('account_receipt_no'))->exists()) {
                return messageResponse('This receipt page no already used : ' . $request->input('account_receipt_no'), 404, 'error');
            }

            $receiptBook = self::$receiptBookModel::find($request->input('account_receipt_book_id'));


            if (!$receiptBook) {
                return messageResponse('Receipt book not found', 404, 'error');
            }

            $receiptNo = $request->input('account_receipt_no');

            if ($receiptNo < $receiptBook->receipt_start_serial_no || $receiptNo > $receiptBook->receipt_end_serial_no) {
                return messageResponse('This receipt page no does not exist in this receipt book', 404, 'error');
            }



            if ($income = self::$model::query()->create($request->validated())) {
                $userName = null;
                if ($request->input('branch_id')) {
                    $userName = self::$userModel::with('roles')->where('id', $request->input('branch_id'))->first();
                } else if ($request->input('central_division_id')) {
                    $userName = self::$userModel::with('roles')->where('id', $request->input('central_division_id'))->first();
                }

                $data = [
                    "user_id" => $request->input('branch_id') ?? $request->input('central_division_id'),
                    "user_type" => $userName ? $userName->roles[0]->name : '',
                    "date" => $income->date,
                    "name" => $userName->full_name ?? "",
                    "amount" => $income->amount,
                    "category_id" => $income->account_category_id,
                    "account_id" => $request->input('account_id'),
                    "account_number_id" => $request->input('account_number_id'),
                    "trx_id" => $request->input('trx_id') ?? '',
                    "receipt_no" => $income->account_receipt_no,
                    "is_income" => 1,
                    "is_expense" => 0,
                    "description" => $income->description,
                    "random_user" => $request->input('random_user'),
                ];

                $accountLogModel = LogStore::execute($data);
                $income->account_log_id =  $accountLogModel->id;
                $income->account_receipt_book_no =  $receiptBook->receipt_book_no;
                $income->update();

                if ($request->input('application_id') && $request->input('application_id') != "null") {
                    $targetMoukuf = new TargetMoukuf();
                    $moulufAmount = self::$applicationModel::find($request->input('application_id'));
                    $targetMoukuf->account_category_id = $income->account_category_id;
                    $targetMoukuf->application_id = $request->input('application_id');
                    $targetMoukuf->user_id = $request->input('user_id');
                    $targetMoukuf->amount = $moulufAmount->moukuf_amount;
                    $targetMoukuf->account_income_id = $income->id;
                    $targetMoukuf->account_log_id = $accountLogModel->id;
                    $targetMoukuf->save();
                }

                $receiptBook->remaining_page = $receiptBook->remaining_page - 1;
                $receiptBook->update();
                return messageResponse('Item added successfully', 201);
            }
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
