<?php

namespace App\Modules\AccountManagement\AccountExpense\Actions;

class All
{
    static $model = \App\Modules\AccountManagement\AccountExpense\Model::class;
    static $supportVoucermodel = \App\Modules\AccountManagement\AccountExpense\SupportModel::class;

    public static function execute()
    {
        try {
            // dd(request()->all());
            $offset = request()->input('offset') ?? 10;
            $condition = [];
            $with = ['account_category'];
            $data = self::$model::query();

            if (auth()->user()->roles[0]->id != 3 && auth()->user()->roles[0]->id != 5) {
                $condition['department_id'] = auth()->user()->parent ? auth()->user()->parent : auth()->user()->id;
            }

            if (request()->has('approved') ) {
                $approved = request()->input('approved');
                
                if ($approved === 'yes') {
                    $condition['approved'] = 1;
                }

                if ($approved == 1) {
                    $condition['approved'] = 1;
                }

                if ($approved == 0 || $approved == 'no') {
                    $condition['approved'] = 0;
                }
            }



  
           

            if (request()->has('status') && request()->input('status')) {
                $condition['status'] = request()->input('status');
            }

            if (request()->has('search') && request()->input('search')) {
                $data = $data->where('title', 'like', '%' . request()->input('search') . '%');
            }

            if (request()->has('get_all') && (int)request()->input('get_all') === 1) {
                $data = $data->with($with)->where($condition)->latest()->get();
            } else {

                if (request()->input('not_approved_by_admin')) {
                    $data = $data->whereExists(function ($query) {
                        $query->select("*")
                            ->from('account_expense_support_table')
                            ->whereRaw('account_expense_support_table.expense_id = account_expenses.id')
                            ->where('account_expense_support_table.approved_by_admin', 0);
                    });
                }

                if (request()->input('not_approved_by_sp_bm')) {
                    $data = $data->whereExists(function ($query) {
                        $query->select("*")
                            ->from('account_expense_support_table')
                            ->whereRaw('account_expense_support_table.expense_id = account_expenses.id')
                            ->where('account_expense_support_table.approved_by_sp_bm', 0);
                    });
                }

                if (request()->input('not_approved_by_bm')) {
                    $data = $data->whereExists(function ($query) {
                        $query->select("*")
                            ->from('account_expense_support_table')
                            ->whereRaw('account_expense_support_table.expense_id = account_expenses.id')
                            ->where('account_expense_support_table.approved_by_bm', 0);
                    });
                }

                if (request()->input('not_approved_by_cp')) {
                    $data = $data->whereExists(function ($query) {
                        $query->select("*")
                            ->from('account_expense_support_table')
                            ->whereRaw('account_expense_support_table.expense_id = account_expenses.id')
                            ->where('account_expense_support_table.approved_by_cp', 0);
                    });
                }


             

                $data = $data->with($with)->where($condition)->latest()->paginate($offset);

            }

            return entityResponse($data);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
    public static function seachByDateWise()
    {
        try {
            // dd(request()->all());
            $offset = request()->input('offset') ?? 10;
            $condition = [];
            $with = ['account_category'];
            $data = self::$model::query();

            if (auth()->user()->roles[0]->id != 3) {
                $condition['department_id'] = auth()->user()->parent ? auth()->user()->parent : auth()->user()->id;
            }
            // if (request()->has('support_admin') && request()->input('support_admin') && request()->input('not_approved_by_admin')) {
            //     $data = $data->whereExists(function ($query) {
            //         $query->select("*")
            //             ->from('account_expense_support_table')
            //             ->whereRaw('account_expense_support_table.expense_id = account_expenses.id')
            //             ->where('account_expense_support_table.approved_by_admin', 0);
            //     });
            // }
            // if (request()->has('support_admin') && request()->input('support_admin') && request()->input('not_approved_by_cp')) {
            //     $data = $data->whereExists(function ($query) {
            //         $query->select("*")
            //             ->from('account_expense_support_table')
            //             ->whereRaw('account_expense_support_table.expense_id = account_expenses.id')
            //             ->where('account_expense_support_table.approved_by_cp', 0);
            //     });
            // }
            
            if (request()->has('approved') ) {
                $approved = request()->input('approved');
                
                if ($approved === 'yes') {
                    $condition['approved'] = 1;
                }

                if ($approved == 1) {
                    $condition['approved'] = 1;
                }

                if ($approved == 0) {
                    $condition['approved'] = 0;
                }
            }

            $data = $data->with($with)
                ->whereDate('created_at', '>=', request()->input('start_date'))
                ->whereDate('created_at', '<=', request()->input('end_date'))
                ->where($condition)
                ->latest()
                ->paginate($offset);
            return entityResponse($data);

        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
