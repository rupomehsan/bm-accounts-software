<?php
namespace App\Modules\AssetManagement\AssetTransfer\Database;

use Illuminate\Database\Seeder as SeederClass;

class Seeder extends SeederClass
{
    /**
     * Run the database seeds.
     php artisan db:seed --class="\App\Modules\AssetManagement\AssetTransfer\Database\Seeder"
     */
    static $model = \App\Modules\AssetManagement\AssetTransfer\Models\Model::class;
    public function run(): void
    {

        self::$model::truncate();
        for ($i = 1; $i < 100; $i++) {
        self::$model::create([
            'asset_id' => facker()->name,
            'sender_id' => facker()->name,
            'receiver_id' => facker()->name,
            'is_accepted_by_receiver' => facker()->name,
            'accepted_date' => facker()->name,
            'request_date' => facker()->name,
            'desctiption' => facker()->name,
            ]);
        }
    }
}