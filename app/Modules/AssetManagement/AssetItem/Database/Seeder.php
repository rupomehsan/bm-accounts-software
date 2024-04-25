<?php
namespace App\Modules\AssetManagement\AssetItem\Database;

use Illuminate\Database\Seeder as SeederClass;

class Seeder extends SeederClass
{
    /**
     * Run the database seeds.
     php artisan db:seed --class="\App\Modules\AssetManagement\AssetItem\Database\Seeder"
     */
    static $model = \App\Modules\AssetManagement\AssetItem\Models\Model::class;
    public function run(): void
    {

        self::$model::truncate();
        for ($i = 1; $i < 100; $i++) {
        self::$model::create([
            'asset_id' => facker()->name,
            'title' => facker()->name,
            'item_image' => facker()->name,
            'price' => facker()->name,
            'qty' => facker()->name,
            'description' => facker()->name,
            'is_waranty' => facker()->name,
            'waranty_date' => facker()->name,
            'waranty_image' => facker()->name,
            ]);
        }
    }
}