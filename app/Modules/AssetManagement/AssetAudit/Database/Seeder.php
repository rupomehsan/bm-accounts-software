<?php
namespace App\Modules\AssetManagement\AssetAudit\Database;

use Illuminate\Database\Seeder as SeederClass;

class Seeder extends SeederClass
{
    /**
     * Run the database seeds.
     php artisan db:seed --class="\App\Modules\AssetManagement\AssetAudit\Database\Seeder"
     */
    static $model = \App\Modules\AssetManagement\AssetAudit\Models\Model::class;
    public function run(): void
    {

        self::$model::truncate();
        for ($i = 1; $i < 100; $i++) {
        self::$model::create([
            'title' => facker()->name,
            'description' => facker()->name,
            'start_date' => facker()->name,
            'end_date' => facker()->name,
            'is_complete' => facker()->name,
            ]);
        }
    }
}