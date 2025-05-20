<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     php artisan migrate --path='\App\Modules\AssetManagement\AssetRequestToCp\Database\create_asset_request_to_cps_table.php'
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('asset_request_to_cps', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('asset_id')->nullable();
            $table->bigInteger('asset_quotation_id')->nullable();
            $table->string('title')->nullable();
            $table->string('quotation_image')->nullable();
            $table->tinyInteger('is_approved')->nullable();
            $table->enum('request_type', ['remove', 'purchase'])->nullable();

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
        Schema::dropIfExists('asset_request_to_cps');
    }
};
