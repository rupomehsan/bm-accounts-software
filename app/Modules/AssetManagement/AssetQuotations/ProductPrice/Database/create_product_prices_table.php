<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     php artisan migrate --path='\App\Modules\AssetManagement\AssetQuotations\ProductPrice\Database\create_product_prices_table.php'
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_prices', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id')->nullable();
            $table->bigInteger('asset_quotation_id')->nullable();
            $table->string('shope_name')->nullable();
            $table->text('address')->nullable();
            $table->string('shop_contact')->nullable();
            $table->float('price')->nullable();
            $table->integer('qty')->nullable();
            $table->string('quotation_image')->nullable();
            $table->string('brand')->nullable();

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
        Schema::dropIfExists('product_prices');
    }
};
