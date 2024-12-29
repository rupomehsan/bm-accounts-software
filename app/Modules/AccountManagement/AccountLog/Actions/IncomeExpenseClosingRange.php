<?php

namespace App\Modules\AccountManagement\AccountLog\Actions;

use Carbon\Carbon;

class IncomeExpenseClosingRange
{
    static $model = \App\Modules\AccountManagement\AccountLog\Model::class;

    public static function execute()
    {
        try {
            $income = self::income_in_range();
            $expense = self::expense_in_range();
            $extra = $income - $expense;
            $extra_before = self::extra_money_before_range();
            $preset_extra = $extra + $extra_before;

            return entityResponse([
                "income" => $income,
                "expense" => $expense,
                "extra" => $extra,
                "extra_before" => $extra_before,
                "preset_extra" => $preset_extra
            ]);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }

    public static function income_in_range()
    {
        $from = Carbon::parse(request()->from);
        $to = Carbon::parse(request()->to);
        $total = self::$model::whereBetween('date', [$from, $to])->where('is_income', 1)->sum('amount');
        return $total;
    }

    public static function expense_in_range()
    {
        $from = Carbon::parse(request()->from);
        $to = Carbon::parse(request()->to);
        $total = self::$model::whereBetween('date', [$from, $to])->where('is_expense', 1)->sum('amount');
        return $total;
    }

    public static function extra_money_before_range()
    {
        $from = Carbon::parse(request()->from);
        $to = Carbon::parse(request()->to);
        $income = self::$model::where('date', '<', $from)->where('is_income', 1)->sum('amount');
        $expense = self::$model::where('date', '<', $from)->where('is_expense', 1)->sum('amount');
        return $income - $expense;
    }
}
