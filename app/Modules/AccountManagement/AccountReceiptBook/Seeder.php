<?php
namespace App\Modules\AccountManagement\AccountReceiptBook;

use Illuminate\Database\Seeder as SeedersSeeder;

class Seeder extends SeedersSeeder
{
    /**
     * Run the database seeds.
     */
    static $model = \App\Modules\AccountManagement\AccountReceiptBook\Model::class;
    public function run(): void
    {
        self::$model::truncate();
        self::$model::create([
            "receipt_book_no" => "1",
            "receipt_start_serial_no" => "1",
            "receipt_end_serial_no" => "12345",
            "is_approvel" => "1"
        ]);
    }
}
