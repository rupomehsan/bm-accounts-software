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
        Schema::create('asset_items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('asset_id')->nullable();
            $table->string('title')->nullable();
            $table->string('item_image', 100)->nullable();
            $table->float('price')->nullable();
            $table->integer('quantity')->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('is_waranty')->default(0);
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
