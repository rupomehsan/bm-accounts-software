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
            "account_category_id" => "1",
            "payment_interval" => "1",
            "branch_id" => "10",
            "target_amount" => "100",
            "session" => "2023-01-01",
            "comment" => ["this is the first comment"],
        ]);
    }
}
