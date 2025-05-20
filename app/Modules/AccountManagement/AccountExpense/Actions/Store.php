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
    static $setMonthModel = \App\Modules\AccountManagement\AccountExpense\SetMonthModel::class;

    public static function execute(Validation $request)
    {
        try {
            // dd($request->all());
            $defaultMonth = self::$setMonthModel::where('active', 1)->first();
            $departmentId = auth()->user()->parent ? auth()->user()->parent : auth()->id();
            $isExistVoucher = self::$model::where('account_expense_category_id', $request->account_expense_category_id)
                ->where("department_id", $departmentId)
                ->where("selected_month", $defaultMonth->month)
                ->first();

            if ($isExistVoucher) {
                $requestData = $request->validated();
                $requestData['department_id'] = auth()->user()->parent ? auth()->user()->parent : auth()->id();
                $requestData['expense_id'] = $isExistVoucher->id;
                $requestData['approved_by_admin'] = auth()->user()->roles[0]->serial == 7 ? 1 : 0;
                if ($request->has('bm_support_admin')) {
                    $requestData['approved_by_admin'] = 1;
                    $requestData['approved_by_sp_bm'] = 1;
                }
                if ($request->has('bm_admin')) {
                    $requestData['approved_by_admin'] = 1;
                    $requestData['approved_by_sp_bm'] = 1;
                    $requestData['approved_by_bm'] = 1;
                }
                if ($request->has('image')) {
                    $image = $request->file('image');
                    $imageUrl = uploader($image, 'uploads/voucher');
                    $supportImage =  self::$supportVoucerImagemodel::create([
                        'url' => $imageUrl
                    ]);
                    $requestData['image_id'] = $supportImage->id;
                }
                unset($requestData['image']);
                $requestData['creator'] = auth()->id();
                self::$supportVoucermodel::create($requestData);
                $isExistVoucher->amount = $isExistVoucher->support_voucher()->sum('amount');
                $isExistVoucher->date = $request->date;
                $isExistVoucher->update();
            } else {
                $voucherData = [
                    "department_id" => auth()->user()->parent ? auth()->user()->parent : auth()->id(),
                    "creator" => auth()->id(),
                    "account_expense_category_id" => $request->account_expense_category_id,
                    "selected_month" => $defaultMonth->month,
                    "folio" =>  $request->folio,
                    "amount" =>  $request->amount,
                    "date" =>  $request->date,
                ];

                if ($voucher = self::$model::create($voucherData)) {
                    $requestData = $request->validated();
                    $requestData['department_id'] = auth()->user()->parent ? auth()->user()->parent : auth()->id();
                    $requestData['expense_id'] = $voucher->id;

                    if ($request->has('bm_support_admin')) {
                        $requestData['approved_by_admin'] = 1;
                        $requestData['approved_by_sp_bm'] = 1;
                    }
                    if ($request->has('bm_admin')) {
                        $requestData['approved_by_admin'] = 1;
                        $requestData['approved_by_sp_bm'] = 1;
                        $requestData['approved_by_bm'] = 1;
                    }

                    if ($request->has('image')) {
                        $image = $request->file('image');
                        $imageUrl = uploader($image, 'uploads/voucher');
                        $supportImage =  self::$supportVoucerImagemodel::create([
                            'url' => $imageUrl
                        ]);
                        $requestData['image_id'] = $supportImage->id;
                    }
                    unset($requestData['image']);
                    $requestData['creator'] = auth()->id();
                    self::$supportVoucermodel::create($requestData);
                }


                // $voucherData = [
                //     "amount" =>  $isExistVoucher->amount + $request->amount,
                //     "date" =>  $request->date,
                // ];
                // $isExistVoucher->update($voucherData);

            }


            return entityResponse($voucher, 200, 'success');
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
