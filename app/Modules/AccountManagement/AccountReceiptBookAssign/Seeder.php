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
        foreach ($receiptBook as $item) {
            self::$model::create([
                "division_id" => rand(13, 18),
                "account_receipt_book_id" => $item->id,
            ]);
        }
    }
}
