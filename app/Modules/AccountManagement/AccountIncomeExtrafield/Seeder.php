<?php
namespace App\Modules\AccountManagement\AccountIncomeExtrafield;

use Illuminate\Database\Seeder as SeedersSeeder;

class Seeder extends SeedersSeeder
{
    /**
     * Run the database seeds.
     */
    static $model = \App\Modules\AccountManagement\AccountIncomeExtrafield\Model::class;
    public function run(): void
    {
        self::$model::truncate();
        self::$model::create([
            "account_income_id" => "1",
            "field_name" => "test",
            "value" => "name"
        ]);
    }
}
