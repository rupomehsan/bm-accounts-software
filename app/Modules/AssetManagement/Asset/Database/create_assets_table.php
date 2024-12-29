<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     php artisan migrate --path='\App\Modules\AssetManagement\Asset\Database\create_assets_table.php'
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('central_division_id')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->bigInteger('price')->nullable();
            $table->string('memo_no')->nullable();
            $table->date('memo_date')->nullable();
            $table->string('code')->nullable();
            $table->text('asset_location')->nullable();
            $table->string('asset_owner')->nullable();
            $table->string('owner_phone_number')->nullable();
            $table->enum('depreciation_type', ['flat', 'percent'])->nullable();
            $table->string('asset_image')->nullable()->default('dummy.png');
            $table->string('voucher_image')->nullable()->default('dummy.png');
            $table->string('acceptance_image')->nullable()->default('dummy.png');
            $table->date('buying_date')->nullable();
            $table->date('hand_over_date')->nullable();
            $table->text('comments')->nullable();
            $table->string('cs_quotaiton_image')->nullable();
            $table->bigInteger('brand_id')->nullable();
            $table->bigInteger('cs_quotation_id')->nullable();
            $table->bigInteger('asset_quotation_id')->nullable();
            $table->bigInteger('asset_request_to_cp_id')->nullable();
            $table->bigInteger('creator')->unsigned()->nullable();
            $table->string('slug', 50)->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
        Schema::create('assets_has_asset_category', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('asset_id')->nullable();
            $table->bigInteger('asset_category_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
        Schema::dropIfExists('assets_has_asset_category');
    }
};
