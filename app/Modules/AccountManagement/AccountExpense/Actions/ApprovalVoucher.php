<?php

namespace App\Modules\AccountManagement\AccountExpense\Actions;

use App\Modules\AccountManagement\AccountLog\Actions\Store as LogStore;

class ApprovalVoucher
{
    static $supportVoucermodel = \App\Modules\AccountManagement\AccountExpense\SupportModel::class;
    static $model = \App\Modules\AccountManagement\AccountExpense\Model::class;

    public static function execute()
    {
        try {

            $offset = request()->input('offset') ?? 10;
            $condition = [];
            $with = ['account_category'];
            $data = self::$model::query();

            if (request()->has('get_all') && (int)request()->input('get_all') === 1) {
                $data = $data->with($with)->where($condition)->latest()->get();
            } else {
                if (request()->has('admin') && request()->input('admin')) {
                    $data = $data->with($with)->get()->filter(function ($q) {
                        return $q->approval->approved_by_admin == false;
                    })->all();
                } elseif (request()->has('bm') && request()->input('bm')) {
                    $data = $data->with($with)->get()->filter(function ($q) {
                        return $q->approval->approved_by_bm == false;
                    })->all();
                } elseif (request()->has('cp') && request()->input('cp')) {
                    if (request()->input('approved')) {
                        $data = $data->with($with)->get()->filter(function ($q) {
                            return $q->approval->approved_by_cp == true;
                        })->all();
                    } else {
                        $data = $data->with($with)->get()->filter(function ($q) {
                            return $q->approval->approved_by_cp == false;
                        })->all();
                    }
                }
            }
            return entityResponse($data);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
    public static function supportVoucherApprovalByAdmin()
    {
        try {

            // dd(request()->all());
            if (!$data = self::$supportVoucermodel::query()->where('id', request()->id)->first()) {
                return messageResponse('Data not found...', 404, 'error');
            }

            if (request()->voucher_status == '') {
                return messageResponse('Select status ...', 404, 'error');
            }
            if (request()->voucher_status == 'canceled') {
                if (request()->cancel_comment == '') {
                    return messageResponse('Comment should not be empty...', 404, 'error');
                }

                if (auth()->user()->roles[0]->serial == 7) {
                    $data->approved_by_admin =  0;
                }
                if (auth()->user()->roles[0]->serial == 6) {
                    $data->approved_by_sp_bm =  0;
                }

                if (auth()->user()->roles[0]->serial == 5) {
                    $data->approved_by_bm =  0;
                }

                if (auth()->user()->roles[0]->serial == 3) {
                    $data->approved_by_cp =  0;
                }

                $data->is_canceled = 1;
                $data->cancel_by = auth()->id();
                $data->cancel_comment = request()->input('cancel_comment');
                $data->update();
            } elseif (request()->voucher_status == 'approved') {

                if (auth()->user()->roles[0]->serial == 7) {
                    $data->approved_by_admin = $data->approved_by_admin == 1 ? 0 : 1;
                }

                if (auth()->user()->roles[0]->serial == 6) {
                    $data->approved_by_sp_bm = $data->approved_by_sp_bm == 1 ? 0 : 1;
                }

                if (auth()->user()->roles[0]->serial == 5) {
                    $data->approved_by_bm = $data->approved_by_bm == 1 ? 0 : 1;
                }


                if (auth()->user()->roles[0]->serial == 3) {
                    $data->approved_by_cp = 1;
                    $data->update();
                    $voucher = self::$model::query()->where('id', $data->expense_id)->first();
                    $supportVoucher = self::$supportVoucermodel::where('expense_id', $data->expense_id)->get();
                    $count = 0;
                    $countTotalSubVoucher = $supportVoucher->count();
                    foreach ($supportVoucher as $item) {
                        if ($item->approved_by_cp == 1) {
                            $count++;
                        }
                    }
                    // dd($count, $countTotalSubVoucher);
                    if ($countTotalSubVoucher == $count) {
                        $voucher->approved = 1;
                        $voucher->update();
                        // dd($voucher);
                    }

                    $logData = [
                        "user_id" => auth()->id(),
                        "user_type" => auth()->user()->roles[0]->name ?? '',
                        "date" => $data->date,
                        "name" => auth()->user()->full_name ?? "",
                        "amount" => $data->amount,
                        "category_id" => $data->account_expense_category_id,
                        "account_id" => null,
                        "account_number_id" => null,
                        "trx_id" =>  null,
                        "receipt_no" => null,
                        "is_income" => 0,
                        "is_expense" => 1,
                        "description" => '',
                        "random_user" => '',
                    ];

                    $logInfor =  LogStore::execute($logData);
                    $data->account_log_id = $logInfor->id;
                    $data->update();
                }
                $data->update();
            }

            return messageResponse('Item successfully updated', 201);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
    public static function voucherCancelComment()
    {
        try {
            if (!$data = self::$supportVoucermodel::query()->where('id', request()->input('voucher_id'))->first()) {
                return messageResponse('Data not found...', 404, 'error');
            }
            $data->approved_by_admin = 0;
            $data->is_canceled = 1;
            $data->cancel_comment = request()->input('cancel_comment');
            $data->update();
            return messageResponse('Voucher canceled');
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }

    public static function bmNotApprovalVoucher()
    {
        try {
            // dd(request()->all());
            $offset = request()->input('offset') ?? 10;
            $condition = [];
            $with = ['account_category'];
            $data = self::$model::query();
            $data = $data->whereExists(function ($query) {
                $query->select("*")
                    ->from('account_expense_support_table')
                    ->whereRaw('account_expense_support_table.expense_id = account_expenses.id')
                    ->where('account_expense_support_table.approved_by_admin', 1)
                    ->where('account_expense_support_table.approved_by_sp_bm', 1)
                    ->where('account_expense_support_table.approved_by_bm', 0);
            });
            $data = $data->with($with)->where($condition)->latest()->paginate($offset);

            return entityResponse($data);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
    public static function CpNotApprovalVoucher()
    {
        try {

            $offset = request()->input('offset') ?? 10;
            $condition = [];
            $with = ['account_category'];
            $data = self::$model::query();
            $data = $data->whereExists(function ($query) {
                $query->select("*")
                    ->from('account_expense_support_table')
                    ->whereRaw('account_expense_support_table.expense_id = account_expenses.id')
                    ->where('account_expense_support_table.approved_by_admin', 1)
                    ->where('account_expense_support_table.approved_by_sp_bm', 1)
                    ->where('account_expense_support_table.approved_by_bm', 1)
                    ->where('account_expense_support_table.approved_by_cp', 0);
            });
            $data = $data->with($with)->where($condition)->latest()->paginate($offset);
            return entityResponse($data);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
    public static function notApprovedBySupportBmVoucher()
    {
        try {
            $offset = request()->input('offset') ?? 10;
            $condition = [];
            $with = ['account_category'];
            $data = self::$model::query();
            $data = $data->whereExists(function ($q) {
                $q->select("*")
                    ->from('account_expense_support_table')
                    ->WhereRaw('account_expense_support_table.expense_id = account_expenses.id')
                    ->where('account_expense_support_table.approved_by_sp_bm', 0);
            });
            $data = $data->with($with)->where($condition)->latest()->paginate($offset);


            return entityResponse($data);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
