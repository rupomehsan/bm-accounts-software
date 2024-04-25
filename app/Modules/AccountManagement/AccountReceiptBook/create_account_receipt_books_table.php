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
        Schema::create('account_receipt_books', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('receipt_book_no')->nullable();
            $table->string('receipt_start_serial_no', 100)->nullable();
            $table->string('receipt_end_serial_no', 100)->nullable();
            $table->tinyInteger('is_approvel')->nullable();
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
        Schema::dropIfExists('account_receipt_books');
    }
};
