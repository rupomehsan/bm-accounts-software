<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     *
     php artisan migrate --path="app\Modules\AccountManagement\AccountLog"
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('account_logs', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('user_id')->nullable();
            $table->string('user_type')->nullable();
            $table->string('random_user')->nullable();

            $table->timestamp('date')->nullable();
            $table->string('name', 200)->nullable();
            $table->float('amount')->nullable();

            $table->bigInteger('category_id')->nullable();
            $table->bigInteger('account_id')->nullable();
            $table->bigInteger('account_number_id')->nullable();
            $table->string('trx_id', 100)->nullable();
            $table->string('receipt_no', 100)->nullable();

            $table->tinyInteger('is_expense')->default(0);
            $table->tinyInteger('is_income')->default(0);

            $table->text('description')->nullable();

            $table->bigInteger('creator')->unsigned()->nullable();
            $table->string('slug', 50)->nullable();
            $table->tinyInteger('status')->unsigned()->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account_logs');
    }
};
