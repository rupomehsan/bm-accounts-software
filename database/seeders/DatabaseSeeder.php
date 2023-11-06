<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

use App\Modules\AccountManagement\AccountBranchBudget\Seeder as AccountBranchBudgetSeeder;
use App\Modules\AccountManagement\AccountBranchTarget\Seeder as AccountBranchTargetSeeder;
use App\Modules\AccountManagement\AccountCategory\Seeder as AccountCategorySeeder;
use App\Modules\AccountManagement\AccountIncome\Seeder as AccountIncomeSeeder;
use App\Modules\AccountManagement\AccountIncomeExtrafield\Seeder as AccountIncomeExtrafieldSeeder;
use App\Modules\AccountManagement\AccountReceiptBook\Seeder as AccountReceiptBookSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AccountBranchBudgetSeeder::class,
            AccountBranchTargetSeeder::class,
            AccountCategorySeeder::class,
            AccountIncomeSeeder::class,
            AccountIncomeExtrafieldSeeder::class,
            AccountReceiptBookSeeder::class

        ]);
    }
}
