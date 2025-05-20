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
        Schema::create('account_branch_targets', function (Blueprint $table) {
            $table->id();
            $table->string('account_category_id')->nullable();
            $table->date('session')->nullable();
            $table->json('comment', 100)->nullable();
            $table->bigInteger('branch_id')->nullable();
            $table->float('target_amount')->nullable();
            $table->string('payment_interval', 50)->nullable();
            $table->bigInteger('creator')->unsigned()->nullable();
            $table->string('slug', 50)->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });

        Schema::create('target_moukuf', function (Blueprint $table) {
            $table->id();
            $table->string('account_income_id')->nullable();
            $table->string('account_log_id')->nullable();
            $table->string('account_category_id')->nullable();
            $table->string('application_id')->nullable();
            $table->string('user_id', 100)->nullable();
            $table->float('amount')->nullable();
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
        Schema::dropIfExists('account_branch_targets');
    }
};
