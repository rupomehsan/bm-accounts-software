<?php
namespace App\Modules\AssetManagement\AssetLost\Database;

use Illuminate\Database\Seeder as SeederClass;

class Seeder extends SeederClass
{
    /**
     * Run the database seeds.
     php artisan db:seed --class="\App\Modules\AssetManagement\AssetLost\Database\Seeder"
     */
    static $model = \App\Modules\AssetManagement\AssetLost\Models\Model::class;
    public function run(): void
    {

        self::$model::truncate();
        for ($i = 1; $i < 100; $i++) {
        self::$model::create([
            'lost_reason' => facker()->name,
            'lost_from_user' => facker()->name,
            'lost_from_user_contact' => facker()->name,
            'lost_date' => facker()->name,
            ]);
        }
    }
}