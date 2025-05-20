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
            "branch_id" => "1",
            "target_amount" => "100"
        ]);
    }
}
