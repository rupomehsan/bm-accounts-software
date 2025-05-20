<?php

namespace App\Modules\UserNotification;

use Illuminate\Database\Seeder as SeedersSeeder;

class Seeder extends SeedersSeeder
{
    /**
     * Run the database seeds.
     */
    static $model = \App\Modules\UserNotification\Model::class;
    public function run(): void
    {
        self::$model::truncate();
        for ($i = 10; $i < 10; $i++) {
            self::$model::create([
                "user_id" => rand(1, 15),
                "topic" => "you have 10 unsee notification",
                "description" => "you have 10 unsee notification"
            ]);
        }
    }
}
