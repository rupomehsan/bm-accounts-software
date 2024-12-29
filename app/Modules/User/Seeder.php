<?php

namespace App\Modules\User;

use Illuminate\Database\Seeder as SeedersSeeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Seeder extends SeedersSeeder
{
    /**
     php artisan db:seed --class="App\Modules\User\Seeder"
     * Run the database seeds.
     */
    static $userModel = \App\Modules\User\Model::class;
    static $roleModel = \App\Modules\UserRole\Model::class;
    public function run(): void
    {
        self::$userModel::truncate();
        self::$roleModel::truncate();
        $roles = [
            'super_admin',
            'admin',
            'cp',
            'sg',
            'bm_manager',
            'bm_support_manager',
            'division_admin',
            'division_support_admin',
            'division_without_audit',
            'branch',
            'auditor',
            'division_employee',
            'well_wisher',
            'loan_recipient',
            'random_user',
        ];

        foreach ($roles as $key => $role) {

            $roleData =   self::$roleModel::create([
                "name" => $role,
                "serial" => $key + 1,
            ]);

            $userData = self::$userModel::create([
                "full_name" => "Mr " . $roleData->name,
                "email" => $roleData->name . "@gmail.com",
                "password" => Hash::make('@12345678'),
                "phone" => rand(99999999999, 999999999999),
                "uid" => $roleData->name,
                "telegram_id" => "812239513",
                "telegram_name" => "Shadhin Jonota"
            ]);

            if ($key == 5) {
                $userData->parent = $key;
            }
            if ($key == 7) {
                $userData->parent = $key;
            }
            $userData->save();
            DB::table('user_user_role')->insert([
                'user_id' => $userData->id,
                'user_role_id' => $roleData->serial
            ]);
        }

        $divisionData = [
            "দপ্তর",
            "সাহিত্য",
            "গবেষণা",
            "প্রচার",
            "তথ্য",
            "প্রকাশনা",
        ];
        $uid = 1001;
        foreach ($divisionData as $divisionName) {

            $userData = self::$userModel::create([
                "full_name" => $divisionName,
                "email" => $divisionName . "@gmail.com",
                "password" => Hash::make('@12345678'),
                "phone" => rand(99999999999, 999999999999),
                "uid" => $uid++,
                "telegram_id" => "812239513",
                "telegram_name" => "Shadhin Jonota"
            ]);

            DB::table('user_user_role')->insert([
                'user_id' => $userData->id,
                'user_role_id' => 7
            ]);
        }
    }
}
