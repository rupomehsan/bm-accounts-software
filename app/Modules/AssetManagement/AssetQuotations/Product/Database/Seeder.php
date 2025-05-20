<?php
namespace App\Modules\AssetManagement\AssetQuotations\Product\Database;

use Illuminate\Database\Seeder as SeederClass;

class Seeder extends SeederClass
{
    /**
     * Run the database seeds.
     php artisan db:seed --class="\App\Modules\AssetManagement\AssetQuotations\Product\Database\Seeder"
     */
    static $model = \App\Modules\AssetManagement\AssetQuotations\Product\Models\Model::class;
    public function run(): void
    {

        self::$model::truncate();
        for ($i = 1; $i < 100; $i++) {
        self::$model::create([
            'asset_quotation_id' => facker()->name,
            'title' => facker()->name,
            ]);
        }
    }
}