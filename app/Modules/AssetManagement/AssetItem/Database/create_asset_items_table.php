<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     php artisan migrate --path='\App\Modules\AssetManagement\AssetItem\Database\create_asset_items_table.php'
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('asset_items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('asset_id')->nullable();
            $table->string('title')->nullable();
            $table->string('item_image')->nullable();
            $table->float('price')->nullable();
            $table->bigInteger('qty')->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('is_waranty')->nullable();
            $table->date('waranty_date')->nullable();
            $table->string('waranty_image')->nullable();

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
        Schema::dropIfExists('asset_items');
    }
};