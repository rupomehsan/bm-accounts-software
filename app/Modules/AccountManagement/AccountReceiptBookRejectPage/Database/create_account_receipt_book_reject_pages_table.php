<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     php artisan migrate --path='/app/Modules/AccountManagement/AccountReceiptBookRejectPage/Database/create_account_receipt_book_reject_pages_table.php'
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('account_receipt_book_reject_pages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('account_receipt_book_id')->nullable();
            $table->bigInteger('account_receipt_no')->nullable();
            $table->text('reason')->nullable();
            $table->string('image')->nullable();

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
        Schema::dropIfExists('account_receipt_book_reject_pages');
    }
};