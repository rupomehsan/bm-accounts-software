<?php
namespace App\Modules\AccountManagement\AccountBranchBudget;

use Illuminate\Database\Seeder as SeedersSeeder;

class Seeder extends SeedersSeeder
{
    /**
     * Run the database seeds.
     */
    static $model = \App\Modules\AccountManagement\AccountBranchBudget\Model::class;
    public function run(): void
    {
        self::$model::truncate();
        self::$model::create([
            "account_category_id" => "1",
            "division_id" => "1",
            "budget_amount" => "100"
        ]);
    }
}
