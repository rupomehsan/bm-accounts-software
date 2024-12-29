<?php
namespace App\Modules\AssetManagement\AssetRequestToCp\Database;

use Illuminate\Database\Seeder as SeederClass;

class Seeder extends SeederClass
{
    /**
     * Run the database seeds.
     php artisan db:seed --class="\App\Modules\AssetManagement\AssetRequestToCp\Database\Seeder"
     */
    static $model = \App\Modules\AssetManagement\AssetRequestToCp\Models\Model::class;
    public function run(): void
    {

        self::$model::truncate();
        for ($i = 1; $i < 100; $i++) {
        self::$model::create([
            'asset_id' => facker()->name,
            'asset_quotation_id' => facker()->name,
            'title' => facker()->name,
            'quotation_image' => facker()->name,
            'is_approved' => facker()->name,
            'request_type' => facker()->name,
            ]);
        }
    }
}