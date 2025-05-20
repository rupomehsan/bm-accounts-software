<?php

namespace App\Modules\AccountManagement\AccountReceiptBook;

use Illuminate\Database\Seeder as SeedersSeeder;

class Seeder extends SeedersSeeder
{
    /**
     *
     php artisan db:seed --class="App\Modules\AccountManagement\AccountReceiptBook\Seeder"
     * Run the database seeds.
     */
    static $model = \App\Modules\AccountManagement\AccountReceiptBook\Model::class;
    public function run(): void
    {
        self::$model::truncate();
        $j = 1;
        for ($i = 100; $i < 2000; $i = $i + 200) {
            self::$model::create([
                "receipt_book_no" => $j++,
                "receipt_start_serial_no" => $i,
                "receipt_end_serial_no" => $i + 100,
                "is_approvel" => 1
            ]);
        }
        for ($i = 3000; $i < 5000; $i = $i + 200) {
            $receiptBook = self::$model::create([
                "receipt_book_no" => $j++,
                "receipt_start_serial_no" => $i,
                "receipt_end_serial_no" => $i + 100,
                "is_approvel" => rand(0,1)
            ]);

        }
    }
}
