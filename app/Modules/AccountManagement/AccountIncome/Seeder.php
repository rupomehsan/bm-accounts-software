<?php

namespace App\Modules\AccountManagement\AccountIncome;

use Carbon\Carbon;
use Illuminate\Database\Seeder as SeedersSeeder;

class Seeder extends SeedersSeeder
{
    /**
     php artisan db:seed --class="App\Modules\AccountManagement\AccountIncome\Seeder"
     * Run the database seeds.
     */
    static $model = \App\Modules\AccountManagement\AccountIncome\Model::class;
    static $receiptBookAssignModel = \App\Modules\AccountManagement\AccountReceiptBookAssign\Model::class;
    static $accountLogModel = \App\Modules\AccountManagement\AccountLog\Model::class;
    public function run(): void
    {
        self::$model::truncate();

        self::$accountLogModel::truncate();

        for ($i = 13; $i < 18; $i++) {
            $receiptBook = self::$receiptBookAssignModel::where('division_id', $i)->first();
            for ($j = 0; $j < 5; $j++) {

                $account_receipt_no = $receiptBook->account_receipt_book->receipt_start_serial_no + $j + 1;

                $income = self::$model::create([
                    "account_receipt_book_id" => $receiptBook->id,
                    "account_receipt_book_no" => $receiptBook->account_receipt_book->receipt_book_no,
                    "account_receipt_no" => $account_receipt_no,
                    "account_category_id" => rand(1, 10),
                    "central_division_id" => $i,
                    "branch_id" => null,
                    "date" => Carbon::now()->subDays(rand(1, 100))->toDateString(),
                    "description" => "income",
                    "amount" => rand(500, 1000),
                    "folio" => $receiptBook->id,
                    "amount_in_text" => numercToAlphabet(rand(500, 1000))
                ]);

                $logInfo =  self::$accountLogModel::create([
                    "user_id" => $i,
                    "user_type" => "central_division",
                    "date" => $income->date,
                    "amount" => $income->amount,
                    "name" => "Mr " . rand(10, 100),
                    "category_id" => $income->account_category_id,
                    "account_id" => null,
                    "account_number_id" => null,
                    "trx_id" => null,
                    "receipt_no" => $income->account_receipt_no,
                    "is_expense" => 0,
                    "is_income" => 1,
                    "description" => "income",

                ]);

                $income->account_log_id = $logInfo->id;
                $income->save();
            }
        }
    }
}
