<?php
namespace App\Modules\AssetManagement\AssetCategory\Database;

use Illuminate\Database\Seeder as SeederClass;

class Seeder extends SeederClass
{
    /**
     * Run the database seeds.
     php artisan db:seed --class="\App\Modules\AssetManagement\AssetCategory\Database\Seeder"
     */
    static $model = \App\Modules\AssetManagement\AssetCategory\Models\Model::class;
    public function run(): void
    {

        self::$model::truncate();
        for ($i = 1; $i < 100; $i++) {
        self::$model::create([
            'title' => facker()->name,
            'desciption' => facker()->name,
            'parent' => facker()->name,
            'image' => facker()->name,
            ]);
        }
    }
}