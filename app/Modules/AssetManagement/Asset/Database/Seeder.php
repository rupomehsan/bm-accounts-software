<?php
namespace App\Modules\AssetManagement\Asset\Database;

use Illuminate\Database\Seeder as SeederClass;

class Seeder extends SeederClass
{
    /**
     * Run the database seeds.
     php artisan db:seed --class="\App\Modules\AssetManagement\Asset\Database\Seeder"
     */
    static $model = \App\Modules\AssetManagement\Asset\Models\Model::class;
    public function run(): void
    {

        self::$model::truncate();
        for ($i = 1; $i < 100; $i++) {
        self::$model::create([
            'central_division_id' => facker()->name,
            'title' => facker()->name,
            'description' => facker()->name,
            'price' => facker()->name,
            'memo_no' => facker()->name,
            'memo_date' => facker()->name,
            'code' => facker()->name,
            'asset_location' => facker()->name,
            'asset_owner' => facker()->name,
            'owner_phone_number' => facker()->name,
            'depreciation_type' => facker()->name,
            'asset_image' => facker()->name,
            'voucher_image' => facker()->name,
            'acceptance_image' => facker()->name,
            'buying_date' => facker()->name,
            'hand_over_date' => facker()->name,
            'comments' => facker()->name,
            'cs_quotaiton_image' => facker()->name,
            'cs_quotation_id' => facker()->name,
            'asset_quotation_id' => facker()->name,
            'asset_request_to_cp_id' => facker()->name,
            ]);
        }
    }
}