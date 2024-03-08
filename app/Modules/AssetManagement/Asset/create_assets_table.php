<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->bigInteger('central_division_id')->nullable();
            $table->string('description', 100)->nullable();
            $table->float('price')->nullable();
            $table->string('memo_no', 100)->nullable();
            $table->string('memo_date', 100)->nullable();
            $table->string('code', 100)->nullable();
            $table->text('asset_location')->nullable();
            $table->string('asset_owner', 100)->nullable();
            $table->string('owner_phone_number', 100)->nullable();
            $table->float('depreciation_amount')->nullable();
            $table->enum('depreciation_type', ['percent', 'flat'])->nullable();
            $table->bigInteger('creator')->unsigned()->nullable();
            $table->string('slug', 50)->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
        Schema::create('asset_asset_category', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('asset_id')->nullable();
            $table->bigInteger('asset_category_id')->nullable();
            $table->timestamps();
        });
        Schema::create('asset_asset_shop_list', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('asset_id')->nullable();
            $table->bigInteger('asset_shop_list_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
        Schema::dropIfExists('asset_asset_category');
        Schema::dropIfExists('asset_asset_shop_list');
    }
};
