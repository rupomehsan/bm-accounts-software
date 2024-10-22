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
        Schema::create('account_incomes', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('account_log_id')->nullable();
            $table->bigInteger('account_receipt_book_id')->nullable();
            $table->bigInteger('account_receipt_book_no')->nullable();
            $table->bigInteger('account_category_id')->nullable();
            $table->bigInteger('central_division_id')->nullable();
            $table->bigInteger('branch_id')->nullable();

            $table->string('income_source_type')->nullable();
            $table->string('account_receipt_no', 100)->nullable();
            $table->date('date')->nullable();
            $table->text('description')->nullable();

            $table->float('amount')->nullable();
            $table->string('amount_in_text', 100)->nullable();

            $table->integer('folio')->unsigned()->nullable();
            $table->string('random_user')->nullable();



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
        Schema::dropIfExists('account_incomes');
    }
};
