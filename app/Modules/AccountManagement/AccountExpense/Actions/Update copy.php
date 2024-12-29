<?php

namespace App\Modules\AccountManagement\AccountExpense\Actions;

use App\Modules\AccountManagement\AccountExpense\Actions\Validation;

class Update
{
    static $model = \App\Modules\AccountManagement\AccountExpense\SupportModel::class;
    // static $supportVoucermodel = \App\Modules\AccountManagement\AccountExpense\SupportModel::class;
    static $supportVoucerImagemodel = \App\Modules\AccountManagement\AccountExpense\SupportImageModel::class;

    public static function execute(Validation $request, $id)
    {
        try {
            dd($id);
            if (!$accountExpense = self::$model::query()->where('id', $id)->first()) {
                return messageResponse('Data not found...', 404, 'error');
            }



            if ($request->input('support_voucher')) {
                $support_voucher = $request->support_voucher;
                foreach ($support_voucher as $index => $item) {
                    if ($item['id'] == null) {
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
            }

            if ($accountExpense) {
                // dd($request->all());
                $supprotVoucehData = $request->support_voucher;

                foreach ($supprotVoucehData as $item) {

                    if ($item['id'] == null && array_key_exists('image', $item)) {
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

                    if ($item['id'] == !null) {
                        // dd($item);
                        $supportImage = '';
                        if (array_key_exists('image', $item)) {
                            $image = $item['image'];
                            $imageUrl = uploader($image, 'uploads/voucher');
                            $supportImage =  self::$supportVoucerImagemodel::create([
                                'url' => $imageUrl
                            ]);
                        }

                        $subVoucherData = self::$supportVoucermodel::find($item['id']);
                        if ($subVoucherData) {
                            $subVoucherData->amount = $item['amount'];
                            $subVoucherData->image_id = $supportImage->id ?? $subVoucherData->image_id;
                            $subVoucherData->update();
                        }
                    }
                }

                $amount = self::$supportVoucermodel::where('expense_id', $accountExpense->id)->sum('amount');
                $accountExpense->amount = $amount;
                $accountExpense->folio = $request->input('folio');;
                $accountExpense->date = $request->input('date');
                $accountExpense->account_expense_category_id = $request->input('account_expense_category_id');
                $accountExpense->update();
            }

            return messageResponse('Item updated successfully');
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
