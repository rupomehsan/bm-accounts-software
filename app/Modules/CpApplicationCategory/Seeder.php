<?php

namespace App\Modules\CpApplicationCategory;

use Illuminate\Database\Seeder as SeedersSeeder;

class Seeder extends SeedersSeeder
{
    /**
     php artisan db:seed --class="App\Modules\CpApplicationCategory\Seeder"
     * Run the database seeds.
     */
    static $model = \App\Modules\CpApplicationCategory\Model::class;
    public function run(): void
    {
        self::$model::truncate();
        $category = [
            'bm moukuf',
            'prokasona moukuf',
            'collection moukuf',
            'leave application',
            'testimonial application',
        ];
        foreach ($category as $item) {
            self::$model::create([
                "title" => $item,
                "description" => null,
            ]);
        }
    }
}
