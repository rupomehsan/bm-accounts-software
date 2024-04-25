<?php
namespace App\Modules\TestModule\ModuleOne\Database;

use Illuminate\Database\Seeder as SeederClass;

class Seeder extends SeederClass
{
    /**
     * Run the database seeds.
     php artisan db:seed --class="\App\Modules\TestModule\ModuleOne\Database\Seeder"
     */
    static $model = \App\Modules\TestModule\ModuleOne\Models\Model::class;
    public function run(): void
    {

        self::$model::truncate();
        for ($i = 1; $i < 100; $i++) {
        self::$model::create([
            'name' => facker()->name,
            'email' => facker()->name,
            'phone' => facker()->name,
            ]);
        }
    }
}