<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     php artisan migrate --path='\App\Modules\AssetManagement\AssetShopList\Database\create_asset_shop_lists_table.php'
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('asset_shop_lists', function (Blueprint $table) {
            $table->id();
            $table->string('shop_name')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('contact_number_1')->nullable();
            $table->string('contact_number_2')->nullable();
            $table->string('image')->nullable();

            $table->bigInteger('creator')->unsigned()->nullable();
            $table->string('slug', 50)->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
        Schema::create('assets_has_asset_shop_lists', function (Blueprint $table) {
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
        Schema::dropIfExists('asset_shop_lists');
        Schema::dropIfExists('assets_has_asset_shop_lists');
    }
};
