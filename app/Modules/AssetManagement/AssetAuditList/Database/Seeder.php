<?php
namespace App\Modules\AssetManagement\AssetAuditList\Database;

use Illuminate\Database\Seeder as SeederClass;

class Seeder extends SeederClass
{
    /**
     * Run the database seeds.
     php artisan db:seed --class="\App\Modules\AssetManagement\AssetAuditList\Database\Seeder"
     */
    static $model = \App\Modules\AssetManagement\AssetAuditList\Models\Model::class;
    public function run(): void
    {

        self::$model::truncate();
        for ($i = 1; $i < 100; $i++) {
        self::$model::create([
            'asset_id' => facker()->name,
            'asset_audit_id' => facker()->name,
            'is_ok' => facker()->name,
            'comment' => facker()->name,
            ]);
        }
    }
}