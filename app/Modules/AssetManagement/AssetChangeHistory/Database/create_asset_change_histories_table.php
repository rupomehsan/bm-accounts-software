<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     php artisan migrate --path='\App\Modules\AssetManagement\AssetChangeHistory\Database\create_asset_change_histories_table.php'
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('asset_change_histories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('asset_id')->nullable();
            $table->string('column_name')->nullable();
            $table->text('old_value')->nullable();

            $table->bigInteger('creator')->unsigned()->nullable();
            $table->string('slug', 50)->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asset_change_histories');
    }
};