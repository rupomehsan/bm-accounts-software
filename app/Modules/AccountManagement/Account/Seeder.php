<?php

namespace App\Modules\AccountManagement\Account;

use Illuminate\Database\Seeder as SeedersSeeder;

class Seeder extends SeedersSeeder
{
    /**
     php artisan db:seed --class="App\Modules\AccountManagement\Account\Seeder"
     * Run the database seeds.
     */
    static $model = \App\Modules\AccountManagement\Account\Model::class;
    public function run(): void
    {

        self::$model::truncate();
        $data = [
            [
                "name" => "cash",
            ],
            [
                "name" => "bank_account",
            ],
            [
                "name" => "bkash",
            ],
            [
                "name" => "nagad",
            ],
            [
                "name" => "rocket",
            ],
        ];

        foreach ($data as $item) {
            self::$model::create($item);
        }
    }
}
