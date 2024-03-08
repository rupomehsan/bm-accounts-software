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
        Schema::create('asset_shop_lists', function (Blueprint $table) {
            $table->id();
            $table->string('shop_name')->nullable();
            $table->string('owner_name', 100)->nullable();
            $table->string('contact_number_1', 20)->nullable();
            $table->string('contact_number_2', 20)->nullable();
            $table->string('image', 100)->nullable();
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
        Schema::dropIfExists('asset_shop_lists');
    }
};
