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
        Schema::create('cp_application_values', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cp_application_id')->nullable();
            $table->bigInteger('title_id')->nullable();
            $table->string('title')->nullable();
            $table->longText('value')->nullable();
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
        Schema::dropIfExists('cp_application_values');
    }
};
