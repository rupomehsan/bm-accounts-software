<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Modules\AccountManagement\Account\Seeder as AccountSeeder;
use App\Modules\AccountManagement\AccountBranchBudget\Seeder as AccountBranchBudgetSeeder;
use App\Modules\AccountManagement\AccountBranchTarget\Seeder as AccountBranchTargetSeeder;
use App\Modules\AccountManagement\AccountCategory\Seeder as AccountCategorySeeder;
use App\Modules\AccountManagement\AccountExpense\Seeder as AccountExpenseSeeder;
use App\Modules\AccountManagement\AccountIncome\Seeder as AccountIncomeSeeder;
use App\Modules\AccountManagement\AccountIncomeExtrafield\Seeder as AccountIncomeExtrafieldSeeder;
use App\Modules\AccountManagement\AccountNumber\Seeder as AccountNumberSeeder;
use App\Modules\AccountManagement\AccountReceiptBook\Seeder as AccountReceiptBookSeeder;
use App\Modules\AccountManagement\AccountReceiptBookAssign\Seeder as AccountReceiptBookAssignSeeder;
use App\Modules\CpApplicationCategory\Seeder as CpApplicationCategorySeeder;
use App\Modules\CpApplicationFormat\Seeder as CpApplicationFormatSeeder;
use App\Modules\UserNotification\Seeder as UserNotificationSeeder;
use App\Modules\User\Seeder as UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([


            UserSeeder::class,

            // AccountReceiptBookSeeder::class,
            // AccountReceiptBookAssignSeeder::class,

            // AccountBranchBudgetSeeder::class,
            // AccountBranchTargetSeeder::class,

            AccountCategorySeeder::class,

            // AccountIncomeSeeder::class,
            // AccountIncomeExtrafieldSeeder::class,

            // AccountExpenseSeeder::class,

            // CpApplicationCategorySeeder::class,
            // CpApplicationFormatSeeder::class,

            // UserNotificationSeeder::class,

            AccountSeeder::class,
            AccountNumberSeeder::class,

        ]);
    }
}
