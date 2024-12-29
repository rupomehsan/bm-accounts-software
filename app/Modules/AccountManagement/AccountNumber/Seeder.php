<?php

namespace App\Modules\AccountManagement\AccountNumber;

use Illuminate\Database\Seeder as SeedersSeeder;

class Seeder extends SeedersSeeder
{
    /**
     php artisan db:seed --class="App\Modules\AccountManagement\AccountNumber\Seeder"
     * Run the database seeds.
     */
    static $model = \App\Modules\AccountManagement\AccountNumber\Model::class;
    public function run(): void
    {
        self::$model::truncate();
        $values = [
            // bank account
            // "3" => [
            //     '+880 169874523',
            //     '+880 169874524',
            //     '+880 169874525',
            // ],
            // bkash
            // "4" => [
            //     '+880 169874526',
            //     '+880 169874527',
            //     '+880 169874528',
            // ],
            // nagad
            // "5" => [
            //     '+880 169874529',
            //     '+880 169874530',
            //     '+880 169874531',
            // ],
            // bank account
            "2" => [
                '2812',
                '2813',
                '2814',
                // 'Agrani bank 874524',
                // 'City bank 874525',
            ],
        ];

        foreach ($values as $account_id => $values) {
            foreach ($values as $value) {
                self::$model::create([
                    'account_id' => $account_id,
                    'value' => $value,
                ]);
            }
        }
    }
}
