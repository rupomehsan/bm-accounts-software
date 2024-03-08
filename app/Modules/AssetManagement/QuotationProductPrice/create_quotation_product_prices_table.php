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
        Schema::create('quotation_product_prices', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('quotation_product_id')->nullable();
            $table->bigInteger('quotation_product_asset_quotation_id')->nullable();
            $table->string('shop_name')->nullable();
            $table->text('address')->nullable();
            $table->string('shop_contact')->nullable();
            $table->float('price')->nullable();
            $table->string('quotation_image', 100)->nullable();
            $table->string('brand', 100)->nullable();
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
        Schema::dropIfExists('quotation_product_prices');
    }
};
