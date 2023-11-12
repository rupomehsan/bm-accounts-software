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
        Schema::create('cp_application_formats', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cp_application_category_id')->nullable();
            $table->string('field_name')->nullable();
            $table->enum('field_type', ['text', 'select', 'radio', 'checkbox', 'file', 'textarea']);
            $table->string('pdf_format', 100)->nullable();
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
        Schema::dropIfExists('cp_application_formats');
    }
};
