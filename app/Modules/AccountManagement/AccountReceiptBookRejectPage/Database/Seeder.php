<?php
namespace App\Modules\AccountManagement\AccountReceiptBookRejectPage\Database;

use Illuminate\Database\Seeder as SeederClass;

class Seeder extends SeederClass
{
    /**
     * Run the database seeds.
     php artisan db:seed --class="\App\Modules\AccountManagement\AccountReceiptBookRejectPage\Database\Seeder"
     */
    static $model = \App\Modules\AccountManagement\AccountReceiptBookRejectPage\Models\Model::class;
    public function run(): void
    {

        self::$model::truncate();
        for ($i = 1; $i < 100; $i++) {
        self::$model::create([
            'account_receipt_book_id' => facker()->name,
            'account_receipt_no' => facker()->name,
            'reason' => facker()->name,
            'image' => facker()->name,
            ]);
        }
    }
}