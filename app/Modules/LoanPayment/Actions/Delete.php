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
            if ($accoutntCategory) {
                $voucherData = [
                    "department_id" => auth()->user()->parent ? auth()->user()->parent : auth()->id(),
                    "creator" => auth()->id(),
                    "account_expense_category_id" => $accoutntCategory->id,
                    "amount" => $data->amount,
                    "date" =>  Carbon::now()->toDateString(),
                    'description' => "Account balance for loan payment deleted, related log id: " . $data->account_log_id,
                ];

                if (self::$logModel::create($voucherData)) {
                    $data->delete();
                    return messageResponse('Item Successfully deleted', 200, 'success');
                }
            }
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
