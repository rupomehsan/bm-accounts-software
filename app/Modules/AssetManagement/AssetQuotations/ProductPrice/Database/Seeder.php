<?php
namespace App\Modules\AssetManagement\AssetQuotations\ProductPrice\Database;

use Illuminate\Database\Seeder as SeederClass;

class Seeder extends SeederClass
{
    /**
     * Run the database seeds.
     php artisan db:seed --class="\App\Modules\AssetManagement\AssetQuotations\ProductPrice\Database\Seeder"
     */
    static $model = \App\Modules\AssetManagement\AssetQuotations\ProductPrice\Models\Model::class;
    public function run(): void
    {

        self::$model::truncate();
        for ($i = 1; $i < 100; $i++) {
        self::$model::create([
            'product_id' => facker()->name,
            'asset_quotation_id' => facker()->name,
            'shope_name' => facker()->name,
            'address' => facker()->name,
            'shop_contact' => facker()->name,
            'price' => facker()->name,
            'quotation_image' => facker()->name,
            'brand' => facker()->name,
            ]);
        }
    }
}