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
        Schema::create('jamanot_payments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('jamanot_provide_id')->nullable();
            $table->bigInteger('account_log_id')->nullable();
            $table->bigInteger('category_id')->nullable();
            $table->bigInteger('amount')->nullable();
            $table->string('amount_in_text')->nullable();
            $table->date('given_date')->nullable();
            $table->string('attachment', 100)->nullable();
            $table->text('description')->nullable();
            $table->string('due')->nullable();
            $table->string('payment_status')->nullable();
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
        Schema::dropIfExists('loan_payments');
    }
};
