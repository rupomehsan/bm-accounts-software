<?php

namespace App\Modules\AccountManagement\AccountReceiptBookAssign;

use Illuminate\Database\Seeder as SeedersSeeder;

class Seeder extends SeedersSeeder
{
    /**
     php artisan db:seed --class="App\Modules\AccountManagement\AccountReceiptBookAssign\Seeder"
     * Run the database seeds.
     */
    static $model = \App\Modules\AccountManagement\AccountReceiptBookAssign\Model::class;
    static $receiptBookModel = \App\Modules\AccountManagement\AccountReceiptBook\Model::class;
    public function run(): void
    {
        self::$model::truncate();

        $receiptBook = self::$receiptBookModel::get();
        $book = 1;
        for ($i = 13; $i <= 18; $i++) {
            // foreach ($receiptBook as $item) {
            self::$model::create([
                "division_id" => $i,
                "account_receipt_book_id" => $book++,
            ]);
            // }
        }
    }
}
