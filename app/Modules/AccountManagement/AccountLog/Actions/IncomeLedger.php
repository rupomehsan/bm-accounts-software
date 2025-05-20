<?php

namespace App\Modules\AccountManagement\AccountLog\Actions;

use Carbon\Carbon;

class IncomeLedger
{

    static $accountLogModel = \App\Modules\AccountManagement\AccountLog\Model::class;
    static $accountCategoryModel = \App\Modules\AccountManagement\AccountCategory\Model::class;

    public static function execute()
    {
        try {
            dd(request()->all());
            $from = Carbon::parse(request()->from);
            $to = Carbon::parse(request()->to);
            $query = self::$accountLogModel::whereBetween('date', [$from, $to]);
            $type = '';
            if (request()->has('is_income')) {
                $query->where('is_income', 1);
                $type = 'income';
            }
            if (request()->has('is_expense')) {
                $query->where('is_expense', 1);
                $type = 'expense';
            }

            $income_categories = self::all_catgories($type);
            $logs = $query->get();

            foreach ($logs as $log) {
                foreach ($income_categories as $item) {
                    $category_id = "cat_" . $item->id;
                    $log->$category_id = "";
                    if ($log->category_id == $item->id) {
                        $log->$category_id = $log->amount;
                    }
                }
            }

            $category_wise_total = self::category_wise_total($from, $to, $type);
            return entityResponse([
                "ledger_data" => $logs,
                "category_wise_total" => $category_wise_total,
            ]);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }

    public static function all_catgories($type = '')
    {
        $categories = self::$accountCategoryModel::where('status', 1)->where('type', $type)->orderBy('title', 'ASC')->get();
        return $categories;
    }

    public static function category_wise_total($from, $to, $type)
    {
        $data = [];

        $query = self::$accountLogModel::whereBetween('date', [$from, $to]);
        if ($type == 'income') {
            $query->where('is_income', 1);
        }
        if ($type == 'expense') {
            $query->where('is_expense', 1);
        }
        $data['total'] = $query->sum('amount');

        $income_categories = self::all_catgories($type);
        foreach ($income_categories as $category) {
            $query = self::$accountLogModel::whereBetween('date', [$from, $to]);
            if ($type == 1) {
                $query->where('is_income', 1);
            }
            if ($type == 2) {
                $query->where('is_expense', 1);
            }

            $data["cat_" . $category->id] = $query->where('category_id', $category->id)->sum('amount');
        }

        return $data;
    }
}
