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
        Schema::create('cp_applications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cp_application_category_id')->nullable();
            $table->bigInteger('applicant_id')->nullable();
            $table->bigInteger('income_category_id')->nullable();
            $table->string('pdf_submission_file', 100)->nullable();
            $table->tinyInteger('is_approve')->default(0);
            $table->text('remarks')->nullable();
            $table->text('subject')->nullable();
            $table->tinyInteger('is_moukuf')->default(0);
            $table->bigInteger('moukuf_amount')->nullable();
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
        Schema::dropIfExists('cp_applications');
    }
};
