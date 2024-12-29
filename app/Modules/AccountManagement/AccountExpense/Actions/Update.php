<?php

namespace App\Modules\AccountManagement\AccountExpense\Actions;

use App\Modules\AccountManagement\AccountExpense\Actions\Validation;

class Update
{
    static $model = \App\Modules\AccountManagement\AccountExpense\Model::class;
    static $supportVoucermodel = \App\Modules\AccountManagement\AccountExpense\SupportModel::class;
    static $supportVoucerImagemodel = \App\Modules\AccountManagement\AccountExpense\SupportImageModel::class;
    static $setMonthModel = \App\Modules\AccountManagement\AccountExpense\SetMonthModel::class;

    public static function execute(Validation $request, $id)
    {
        try {
            // dd($request->all());

            if (!$accountExpense = self::$supportVoucermodel::query()->where('id', $id)->first()) {
                return messageResponse('Data not found...', 404, 'error');
            }

            if ($accountExpense->approved_by_upperadmin) {
                return messageResponse('Sorry ,its approved by upperd admin you can`t update', 403, 'error');
            }


            $Voucher = self::$model::where('id', $accountExpense->expense_id)->first();

            $requestData = $request->validated();
            $requestData['department_id'] = auth()->id();
            if ($request->has('image')) {
                $image = $request->file('image');
                $imageUrl = uploader($image, 'uploads/voucher');
                $supportImage =  self::$supportVoucerImagemodel::create([
                    'url' => $imageUrl
                ]);
                $requestData['image_id'] = $supportImage->id;
            }

            unset($requestData['image']);
            $accountExpense->update($requestData);

            $Voucher->amount = $Voucher->support_voucher()->sum('amount');
            $Voucher->date = $request->date;
            $Voucher->save();
            return messageResponse('Item updated successfully');
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
