<?php

namespace App\Modules\LoanPayment\Actions;

use Carbon\Carbon;

class Delete
{
    static $model = \App\Modules\LoanPayment\Model::class;
    static $logModel = \App\Modules\AccountManagement\AccountLog\Model::class;
    static $accoutnCategryModel = \App\Modules\AccountManagement\AccountCategory\Model::class;

    public static function execute($id)
    {
        try {
            if (!$data = self::$model::find($id)) {
                return messageResponse('Data not found...', 404, 'error');
            }

            $accoutntCategory = self::$accoutnCategryModel::where('title', 'ঋণ ডিলিট')->first();
            $log = self::$logModel::find($data->account_log_id);
            if ($log) {
                $voucherData = [
                    "user_id" => auth()->id(),
                    "user_type" => auth()->user()->roles()->first()?->name,
                    "date" =>  Carbon::now()->toDateString(),
                    "name" => auth()->user()->name,
                    "amount" => $data->amount,
                    "category_id" => $accoutntCategory->id,
                    "creator" => auth()->id(),
                    'description' => "Account balance for loan  deleted, related log id: " . $data->account_log_id,
                    'is_income' => 0,
                    'is_expense' => 1,
                ];

                $acLog = logEntry($voucherData);
                if ($acLog) {
                    $data->delete();
                    return messageResponse('Item Successfully deleted', 200, 'success');
                }
            }
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
