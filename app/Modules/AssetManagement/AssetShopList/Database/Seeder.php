<?php
namespace App\Modules\AssetManagement\AssetShopList\Database;

use Illuminate\Database\Seeder as SeederClass;

class Seeder extends SeederClass
{
    /**
     * Run the database seeds.
     php artisan db:seed --class="\App\Modules\AssetManagement\AssetShopList\Database\Seeder"
     */
    static $model = \App\Modules\AssetManagement\AssetShopList\Models\Model::class;
    public function run(): void
    {

        self::$model::truncate();
        for ($i = 1; $i < 100; $i++) {
        self::$model::create([
            'shop_name' => facker()->name,
            'owner_name' => facker()->name,
            'contact_number_1' => facker()->name,
            'contact_number_2' => facker()->name,
            'image' => facker()->name,
            ]);
        }
    }
}