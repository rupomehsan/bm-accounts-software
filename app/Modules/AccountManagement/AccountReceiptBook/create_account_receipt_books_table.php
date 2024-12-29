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
            $table->bigInteger('receipt_book_no')->unsigned()->nullable();
            $table->bigInteger('receipt_start_serial_no')->unsigned()->nullable();
            $table->bigInteger('receipt_end_serial_no')->unsigned()->nullable();
            $table->bigInteger('remaining_page')->unsigned()->default(40);
            $table->tinyInteger('is_approvel')->nullable();
            $table->tinyInteger('is_rejected')->nullable();
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
