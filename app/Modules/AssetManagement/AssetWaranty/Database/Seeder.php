<?php
namespace App\Modules\AssetManagement\AssetWaranty\Database;

use Illuminate\Database\Seeder as SeederClass;

class Seeder extends SeederClass
{
    /**
     * Run the database seeds.
     php artisan db:seed --class="\App\Modules\AssetManagement\AssetWaranty\Database\Seeder"
     */
    static $model = \App\Modules\AssetManagement\AssetWaranty\Models\Model::class;
    public function run(): void
    {

        self::$model::truncate();
        for ($i = 1; $i < 100; $i++) {
        self::$model::create([
            'asset_id' => facker()->name,
            'waranty_date' => facker()->name,
            'description' => facker()->name,
            'waranty_card_image' => facker()->name,
            ]);
        }
    }
}