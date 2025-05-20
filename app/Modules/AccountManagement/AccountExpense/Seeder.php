<?php

namespace App\Modules\AccountManagement\AccountExpense;

use Illuminate\Database\Seeder as SeedersSeeder;
use Illuminate\Support\Facades\DB;

class Seeder extends SeedersSeeder
{
    /**
     php artisan db:seed --class="App\Modules\AccountManagement\AccountExpense\Seeder"
     * Run the database seeds.
     */
    static $model = \App\Modules\AccountManagement\AccountExpense\Model::class;
    static $SupportModel = \App\Modules\AccountManagement\AccountExpense\SupportModel::class;
    static $accountLogModel = \App\Modules\AccountManagement\AccountLog\Model::class;

    public function run(): void
    {
        self::$model::truncate();
        self::$SupportModel::truncate();

        for ($i = 1; $i <= 5; $i++) {

            $voucher =  self::$model::create([
                "department_id" => 8,
                "amount" => 0,
                "date" => "2024-01-11",
                'account_expense_category_id' => rand(16, 54)
            ]);

            for ($j = 1; $j <= 10; $j++) {
                $supportVoucher =  self::$SupportModel::create([
                    "expense_id" => $voucher->id,
                    "account_expense_category_id" => $voucher->account_expense_category_id,
                    "approved_by_admin" => rand(0, 1),
                    "approved_by_cp" => 0,
                    "approved_by_bm" => 0,
                    "department_id" => 8,
                    "is_canceled" => 0,
                    "cancel_comment" => "",
                    "amount" => rand(100, 500),
                    "date" => "2024-01-11",
                ]);
            }

            $amount = self::$SupportModel::where('expense_id', $voucher->id)->sum('amount');

            $logInfo =  self::$accountLogModel::create([
                "user_id" => $voucher->department_id,
                "user_type" => "",
                "date" => $voucher->date,
                "amount" => $amount,
                "name" => "Mr " . rand(10, 100),
                "category_id" => $voucher->account_expense_category_id,
                "account_id" => null,
                "account_number_id" => null,
                "trx_id" => null,
                "receipt_no" => '',
                "is_expense" => 1,
                "is_income" => 0,
                "description" => "expense",

            ]);


            $voucher->amount = $amount;
            $voucher->update();
        }
    }
}
