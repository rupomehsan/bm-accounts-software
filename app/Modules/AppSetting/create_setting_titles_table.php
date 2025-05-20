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
        Schema::create('setting_titles', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->bigInteger('creator')->unsigned()->nullable();
            $table->string('slug', 50)->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
        Schema::create('setting_values', function (Blueprint $table) {
            $table->id();
            $table->string('setting_title_id')->nullable();
            $table->string('setting_title')->nullable();
            $table->text('value')->nullable();
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
        Schema::dropIfExists('setting_titles');
        Schema::dropIfExists('setting_values');
    }
};
