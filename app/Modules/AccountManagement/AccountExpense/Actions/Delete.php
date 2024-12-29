<?php

namespace App\Modules\AccountManagement\AccountExpense\Actions;

class Delete
{
    static $model = \App\Modules\AccountManagement\AccountExpense\Model::class;
    static $supportVoucermodel = \App\Modules\AccountManagement\AccountExpense\SupportModel::class;

    public static function execute($id)
    {
        try {
            if (!$data = self::$supportVoucermodel::find($id)) {
                return messageResponse('Data not found...', 404, 'error');
            }
            $userRole = auth()->user()->roles[0]->serial;
            $rolesSerial = [
                "8" =>  'support_admin',
                "7" =>  'approved_by_admin',
                "5" =>  'approved_by_bm',
                "3" => 'approved_by_cp'
            ];

            $roleSerial2 = [
                "8", //  'support_admin',
                "7", //  'approved_by_admin',
                "5", //  'approved_by_bm',
                "3", // 'approved_by_cp'
            ];


            $upperAdminRole = array_search($userRole, $roleSerial2) + 1;
            $upperAdmin = $rolesSerial[$roleSerial2[$upperAdminRole]];

            if ($data->$upperAdmin == 1) {
                return messageResponse('Sorry ,its approved by upperd admin you can`t delete', 403, 'error');
            }


            if ($data->delete()) {
                $Voucher = self::$model::where('id', $data->expense_id)->first();
                $Voucher->amount = $Voucher->support_voucher()->sum('amount');
                $Voucher->save();
            }
            return messageResponse('Item Successfully deleted', 200, 'success');
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
