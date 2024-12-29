<?php

namespace App\Modules\AccountManagement\AccountLog\Actions;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;

class Reporting
{
    static $model = \App\Modules\AccountManagement\AccountLog\Model::class;
    static $accountCategoryModel = \App\Modules\AccountManagement\AccountCategory\Model::class;
    static $loanRegistermodel = \App\Modules\LoanProvider\Model::class;
    static $jamanotRegistermodel = \App\Modules\JamanotProvider\Model::class;
    static $userModel = \App\Modules\User\Model::class;
    static $houseRentModel = \App\Modules\HouseRent\Model::class;
    static $officeRentModel = \App\Modules\OfficeRent\Model::class;

    public static function mainLedger()
    {
        try {

            $from = Carbon::now()->subDays(30);
            $to = Carbon::now()->subDays(30);

            if (request()->input('start_date') && request()->input('end_date')) {
                $from = request()->input('start_date');
                $to = request()->input('end_date');
            }

            // dd(Carbon::parse($from));

            $with = ['account_incomes:account_log_id,folio', 'account_category:id,title'];
            $data = [
                "income" => [],
                "expense" => [],
            ];
            $log = self::$model::query()
                ->with($with)
                ->whereBetween('date', [$from, $to])
                ->orderBy('date', 'asc')
                ->get();

            if ($log) {
                foreach ($log as $item) {
                    if ($item->is_expense == 1) {
                        $data['expense'][] = $item->toArray();
                    }
                    if ($item->is_income == 1) {
                        $data['income'][] = $item->toArray();
                    }
                }
            }

            $incomeData = $data['income'];
            $total = 0;
            foreach ($incomeData as $index => $income) {
                $total += $income['amount'];
                $incomeData[$index]['total'] = $total;
            }
            $data['income'] = $incomeData;


            $expenseData = $data['expense'];
            $total = 0;
            foreach ($expenseData as $index => $expense) {
                $total += $expense['amount'];
                $expenseData[$index]['total'] = $total;
            }
            $data['expense'] = $expenseData;
            return entityResponse($data);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }

    static public function statements()
    {
        $type = request()->type;
        $from = Carbon::parse(request()->start_date);
        $to = Carbon::parse(request()->end_date);
        $with = ['account_incomes:account_log_id,folio', 'account_category:id,title'];
        $logs = '';
        if ($type == 'income') {
            $logs = self::$model::with($with)->whereBetween('date', [$from, $to])->where('is_income', 1)->get();
        } elseif ($type == 'expense') {
            $logs = self::$model::with($with)->whereBetween('date', [$from, $to])->where('is_expense', 1)->get();
        }


        $prev_income = self::$model::where('date', '<', $from)->where('is_income', 1)->sum('amount');
        $prev_expense = self::$model::where('date', '<', $from)->where('is_expense', 1)->sum('amount');
        $prev_balance = $prev_income - $prev_expense;

        $total_income = self::$model::where('is_income', 1)->where('date', '<', $to)->sum('amount');
        $total_expense = self::$model::where('is_expense', 1)->where('date', '<', $to)->sum('amount');
        $total_balance = $total_income - $total_expense;

        $satements = [];
        $satements[] = [
            "date" => $from->subDay(1)->format('d M, y'),
            "receipt" => "",
            "description" => "",
            "income" => $prev_income,
            "expense" => $prev_expense,
            "balance" => $prev_balance,
            "folio" => '',
            "income_or_expense" => '',
        ];

        foreach ($logs as $log) {
            // dd($log);
            $temp = [
                "date" => Carbon::parse($log->date)->format('d M, y'),
                "receipt" => $log->receipt_no,
                "description" => $log->account_category?->title,
                "folio" => $log->account_incomes->folio ?? '',
                "income" => $log->is_income == 1 ? $log->amount : '',
                "expense" => $log->is_expense == 1 ? $log->amount : '',
                "income_or_expense" => $log->is_expense == 1 ? 'expense' : 'income',
                "balance" => $log->is_income == 1 ? $prev_balance += $log->amount : $prev_balance -= $log->amount,
            ];


            $satements[] = $temp;
        }
        return response()->json([
            "statements" => $satements,
            "statements_total" => [
                "total_income" => $total_income,
                "total_expense" => $total_expense,
                "total_balance" => $total_balance,
            ],
        ]);
    }


    static public function income_in_range()
    {

        $from = Carbon::parse(request()->from);
        $to = Carbon::parse(request()->to);
        $total = self::$model::whereBetween('date', [$from, $to])->where('is_income', 1)->sum('amount');
        return $total;
    }

    static public function expense_in_range()
    {
        $from = Carbon::parse(request()->from);
        $to = Carbon::parse(request()->to);
        $total = self::$model::whereBetween('date', [$from, $to])->where('is_expense', 1)->sum('amount');
        return $total;
    }

    static public function extra_money_before_range()
    {
        $from = Carbon::parse(request()->from);
        $to = Carbon::parse(request()->to);
        $income = self::$model::where('date', '<', $from)->where('is_income', 1)->sum('amount');
        $expense = self::$model::where('date', '<', $from)->where('is_expense', 1)->sum('amount');
        return $income - $expense;
    }

    static public function income_expense_closing_in_range()
    {
        $income = self::income_in_range();
        $expense = self::expense_in_range();
        $extra = $income - $expense;
        $extra_before = self::extra_money_before_range();
        $preset_extra = $extra + $extra_before;
        return [
            "income" => $income,
            "expense" => $expense,
            "extra" => $extra,
            "extra_before" => $extra_before,
            "preset_extra" => $preset_extra
        ];
    }

    static public function get_all_loan_register()
    {
        try {

            $from = Carbon::now()->subDays(30);
            $to = Carbon::now()->subDays(30);

            if (request()->input('start_date') && request()->input('end_date')) {
                $from = request()->input('start_date');
                $to = request()->input('end_date');
            }

            $data = self::$loanRegistermodel::query()->with('loan_payment')
                ->whereBetween('taken_date', [$from, $to])
                ->orderBy('taken_date', 'asc')
                ->get();
            return entityResponse($data);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
    static public function get_all_jamanot_register()
    {
        try {

            $from = Carbon::now()->subDays(30);
            $to = Carbon::now()->subDays(30);

            if (request()->input('start_date') && request()->input('end_date')) {
                $from = request()->input('start_date');
                $to = request()->input('end_date');
            }

            $data = self::$jamanotRegistermodel::query()->with('jamanot_payment')
                ->whereBetween('taken_date', [$from, $to])
                ->orderBy('taken_date', 'asc')
                ->get();
            return entityResponse($data);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
    static public function get_all_niyomito_prodan()
    {
        try {

            $from = Carbon::now()->subDays(30);
            $to = Carbon::now()->subDays(30);

            if (request()->input('start_date') && request()->input('end_date')) {
                $from = request()->input('start_date');
                $to = request()->input('end_date');
            }

            $category = self::$accountCategoryModel::where('title', 'মাসিক আয়')->first();

            $data = self::$model::query()->with('user:id,full_name', 'account_category:id,title')->where('category_id', $category->id)
                ->whereBetween('date', [$from, $to])
                ->get();

            return entityResponse($data);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
    static public function get_all_kendriosuvakanghi_income()
    {
        try {

            $from = Carbon::now()->subDays(30);
            $to = Carbon::now()->subDays(30);

            if (request()->input('start_date') && request()->input('end_date')) {
                $from = request()->input('start_date');
                $to = request()->input('end_date');
            }

            $data = self::$model::query()->with('account_category:id,title')
                ->whereExists(function ($query) {
                    $query->select(DB::raw(1))
                        ->from('user_user_role')
                        ->whereColumn('user_user_role.user_id', 'account_logs.user_id')
                        ->where('user_user_role.user_role_id', 13);
                })->get();

            return entityResponse($data);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
    static public function get_all_office_rent()
    {
        try {

            $from = Carbon::now()->subDays(30);
            $to = Carbon::now()->subDays(30);

            if (request()->input('start_date') && request()->input('end_date')) {
                $from = request()->input('start_date');
                $to = request()->input('end_date');
            }
            $diffMonth = Carbon::parse($from)->diffInMonths(Carbon::parse($to));

            $month = [];
            $result = [];
            $temp = [];
            $officeName = self::$officeRentModel::select('office_name')->distinct('office_name')->get();
            // dd($officeName->toArray());
            foreach ($officeName as $item) {
                $temp[] = $item->office_name;
                for ($i = $diffMonth; $i >= 0; $i--) {
                    $dateObj = Carbon::parse($to)->subMonths($i);
                    $curMont = $dateObj->clone()->format('m');
                    $curYear = $dateObj->clone()->format('Y');
                    $temp[] = self::$officeRentModel::whereYear('month', $curYear)->whereMonth('month', $curMont)->where('office_name', $item->office_name)->sum('amount');
                }
                $result[] = $temp;
                $temp = [];
            }

            for ($i = $diffMonth; $i >= 0; $i--) {
                $dateObj = Carbon::parse($to)->subMonths($i);
                $month[] = $dateObj->clone()->format('F, y');
            }

            $data = [
                'month' => $month,
                'data' => $result
            ];
            return entityResponse($data);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
    static public function get_all_house_rent()
    {
        try {

            $from = Carbon::now()->subDays(30);
            $to = Carbon::now()->subDays(30);

            if (request()->input('start_date') && request()->input('end_date')) {
                $from = request()->input('start_date');
                $to = request()->input('end_date');
            }
            $diffMonth = Carbon::parse($from)->diffInMonths(Carbon::parse($to));

            $month = [];
            $result = [];
            $temp = [];
            $officeName = self::$houseRentModel::select('house_name')->distinct('house_name')->get();
            // dd($officeName->toArray());
            foreach ($officeName as $item) {
                $temp[] = $item->house_name;
                for ($i = $diffMonth; $i >= 0; $i--) {
                    $dateObj = Carbon::parse($to)->subMonths($i);
                    $curMont = $dateObj->clone()->format('m');
                    $curYear = $dateObj->clone()->format('Y');
                    $temp[] = self::$houseRentModel::whereYear('month', $curYear)->whereMonth('month', $curMont)->where('house_name', $item->house_name)->sum('amount');
                }
                $result[] = $temp;
                $temp = [];
            }

            for ($i = $diffMonth; $i >= 0; $i--) {
                $dateObj = Carbon::parse($to)->subMonths($i);
                $month[] = $dateObj->clone()->format('F, y');
            }

            $data = [
                'month' => $month,
                'data' => $result
            ];
            return entityResponse($data);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
    static public function get_all_ekkalin_prodan()
    {
        try {

            $from = Carbon::now()->subDays(30);
            $to = Carbon::now()->subDays(30);

            if (request()->input('start_date') && request()->input('end_date')) {
                $from = request()->input('start_date');
                $to = request()->input('end_date');
            }

            $diffDate = Carbon::parse($from)->diffInDays(Carbon::parse($to));
            $data = [];

            for ($i = $diffDate; $i >= 1; $i--) {
                $date = Carbon::now()->subDays($i)->toDateString();
                $temp = [];
                $temp[] = $date;
                $sum = 0;
                $temp[1] = $sum;
                $sum += $temp[] = self::CategoryTotal('আবাসন', $date);
                $temp[2] = $temp[2] == 0 ? '' : $temp[2];

                $sum += $temp[] = self::CategoryTotal('যানবাহন', $date);
                $temp[3] = $temp[3] == 0 ? '' : $temp[3];

                $sum += $temp[] = self::CategoryTotal('সম্পদ', $date);
                $temp[4] = $temp[4] == 0 ? '' : $temp[4];

                $sum += $temp[] = self::CategoryTotal('চিকিৎসা', $date);
                $temp[5] = $temp[5] == 0 ? '' : $temp[5];

                $sum += $temp[] = self::CategoryTotal('ছাত্রকল্যান', $date);
                $temp[6] = $temp[6] == 0 ? '' : $temp[6];

                $sum += $temp[] = self::CategoryTotal('শিক্ষা সহায়তা', $date);
                $temp[7] = $temp[7] == 0 ? '' : $temp[7];

                $sum += $temp[] = self::CategoryTotal('প্রো.বাস্তবায়ন', $date);
                $temp[8] = $temp[8] == 0 ? '' : $temp[8];

                $sum += $temp[] = self::CategoryTotal('প্রশিক্ষন', $date);
                $temp[9] = $temp[9] == 0 ? '' : $temp[9];

                $sum += $temp[] = self::CategoryTotal('শহীদ পরিবার', $date);
                $temp[10] = $temp[10] == 0 ? '' : $temp[10];

                $sum += $temp[] = self::CategoryTotal('মামলা', $date);
                $temp[11] = $temp[11] == 0 ? '' : $temp[11];

                $sum += $temp[] = self::CategoryTotal('শিশুকল্যাণ', $date);
                $temp[12] = $temp[12] == 0 ? '' : $temp[12];

                $sum += $temp[] = self::CategoryTotal('দা.কার্যক্রম', $date);
                $temp[13] = $temp[13] == 0 ? '' : $temp[13];

                $temp[1] = $sum;
                $data[] = $temp;
            }


            return entityResponse($data);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }

    static public  function CategoryTotal($categoryName, $date)
    {
        $category = self::$accountCategoryModel::where('title', $categoryName)->first();
        $logAmount = self::$model::whereDate('date', $date)->where('category_id', $category->id)->sum('amount');
        return $logAmount;
    }
}
