<?php

namespace App\Modules\AccountManagement\AccountLog\Actions;

use Carbon\Carbon;

class IncomeExpenseReport
{
    static $model = \App\Modules\AccountManagement\AccountLog\Model::class;
    static $accountCategoryModel = \App\Modules\AccountManagement\AccountCategory\Model::class;

    public static function execute()
    {

        try {

            // dd(request()->all());

            $from = request()->input('from');
            $to = request()->input('to');

            if (!request()->input('from')) {
                $from = Carbon::now()->subDays(30)->toDateString();
                $to = Carbon::now()->addDays(30)->toDateString();
            }

            $allCategory = [
                "আয়" => self::$accountCategoryModel::where('type', 'income')->get(),
                "ব্যয়" => self::$accountCategoryModel::where('type', 'expense')->get(),
            ];

            $total_income = 0;
            $total_expense = 0;

            $get_previous_extra_income = self::$model::where('date', '<', $from)->where('is_income', 1)->sum('amount');
            $get_previous_extra_expense = self::$model::where('date', '<', $from)->where('is_expense', 1)->sum('amount');;
            $get_previous_extra_money = $get_previous_extra_income - $get_previous_extra_expense;

            foreach ($allCategory as $type => $categories) {
                foreach ($categories as $category) {
                    if ($type == 'আয়') {
                        $total_income += $category->logs_sum_total = self::$model::whereBetween('date', [$from, $to])->where('category_id', $category->id)->where('is_income', 1)->sum('amount');
                    } else {
                        $total_expense += $category->logs_sum_total = self::$model::whereBetween('date', [$from, $to])->where('category_id', $category->id)->where('is_expense', 1)->sum('amount');
                    }
                }
            }

            $data = [
                'data' => [
                    [
                        "name" => "আয়",
                        "categories" => $allCategory['আয়']
                    ],
                    [
                        "name" => "ব্যয়",
                        "categories" => $allCategory['ব্যয়']
                    ],
                ],
                "total_income" => $total_income,
                "total_expense" => $total_expense,
                "get_previous_extra_money" => $get_previous_extra_money,
                "date_title" => Carbon::now()->format("F"),
                "date_year" => Carbon::now()->format("Y")
            ];

            return entityResponse($data);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
