<?php
namespace App\Modules\AssetManagement\AssetChangeHistory\Database;

use Illuminate\Database\Seeder as SeederClass;

class Seeder extends SeederClass
{
    /**
     * Run the database seeds.
     php artisan db:seed --class="\App\Modules\AssetManagement\AssetChangeHistory\Database\Seeder"
     */
    static $model = \App\Modules\AssetManagement\AssetChangeHistory\Models\Model::class;
    public function run(): void
    {

        self::$model::truncate();
        for ($i = 1; $i < 100; $i++) {
        self::$model::create([
            'asset_id' => facker()->name,
            'column_name' => facker()->name,
            'old_value' => facker()->name,
            ]);
        }
    }
}