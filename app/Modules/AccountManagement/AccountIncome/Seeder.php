<?php

namespace App\Modules\AccountManagement\AccountBranchTarget;

use Illuminate\Database\Seeder as SeedersSeeder;

class Seeder extends SeedersSeeder
{
    /**
     * Run the database seeds.
     */
    static $model = \App\Modules\AccountManagement\AccountBranchTarget\Model::class;
    public function run(): void
    {
        self::$model::truncate();
        self::$model::create([
            "account_receipt_book_id" => "1",
            "account_receipt_book_no" => "1",
            "account_category_id" => "1",
            "branch_id" => "1",
            "account_receipt_no" => "12345",
            "date" => "2023-05-30",
            "description" => "description",
            "amount" => "100",
            "amount_in_text" => "100"
        ]);
    }
}
