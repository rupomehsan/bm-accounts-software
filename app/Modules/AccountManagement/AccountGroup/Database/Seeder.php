<?php

namespace App\Modules\AccountManagement\AccountGroup\Database;

use Illuminate\Database\Seeder as SeederClass;

class Seeder extends SeederClass
{
    /**
     * Run the database seeds.
     php artisan db:seed --class="\App\Modules\AccountManagement\AccountGroup\Database\Seeder"
     */
    static $model = \App\Modules\AccountManagement\AccountGroup\Models\Model::class;
    public function run(): void
    {

        self::$model::truncate();
        $data = [
            "Cash",
            "Bank",
            "Mobile Banking",
            "E-Wallet / Digital Wallet",
            "International Payment",
        ];

        foreach ($data as $key => $value) {
            self::$model::create([
                'name' => $value,
            ]);
        }
    }
}
