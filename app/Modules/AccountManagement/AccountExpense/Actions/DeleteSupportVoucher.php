<?php

namespace App\Modules\AccountManagement\AccountExpense\Actions;

class DeleteSupportVoucher
{
    static $supportVoucermodel = \App\Modules\AccountManagement\AccountExpense\SupportModel::class;
    static $model = \App\Modules\AccountManagement\AccountExpense\Model::class;

    public static function execute($id)
    {
        try {
            if (!$data = self::$supportVoucermodel::find($id)) {
                return messageResponse('Data not found...', 404, 'error');
            }

            if ($data->approved_by_admin == 1 || $data->approved_by_bm == 1 || $data->approved_by_cp == 1) {
                return messageResponse("Sorry this vhoucher already acceted,can't delete", 404, 'error');
            }

            $data->delete();
            $amount = self::$supportVoucermodel::where('expense_id', $data->expense_id)->sum('amount');
            $accountExpense = self::$model::where('id', $data->expense_id)->first();
            $accountExpense->amount = $amount;
            $accountExpense->update();
            return messageResponse('Item Successfully deleted', 200, 'success');
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
