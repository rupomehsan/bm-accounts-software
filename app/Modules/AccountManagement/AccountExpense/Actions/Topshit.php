<?php

namespace App\Modules\AccountManagement\AccountExpense\Actions;

class Topshit
{
    static $model = \App\Modules\AccountManagement\AccountExpense\Model::class;
    static $SupportModel = \App\Modules\AccountManagement\AccountExpense\SupportModel::class;

    public static function execute($id)
    {
        try {

            $voucher = self::$model::with('account_category', 'department', 'creator')->find($id);

            if ($voucher) {
                $limit = 5;
                $chunck_count = ceil(self::$SupportModel::where('expense_id', $id)->count() / $limit);
                $support = [];
                for ($i = 0; $i < $chunck_count; $i++) {
                    $support[] = self::$SupportModel::with('image_url')->where('expense_id', $id)->take($limit)->skip($limit * $i)->get();
                }

                // $support = collect(self::$SupportModel::where('expense_id', $id)->get()->toArray())->chunk(5);
                $voucher->amount_id_text = numercToAlphabet($voucher->amount);
                $data = [
                    'voucher' => $voucher,
                    'supportVoucher' => $support,
                ];

                return entityResponse($data);
            }
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
