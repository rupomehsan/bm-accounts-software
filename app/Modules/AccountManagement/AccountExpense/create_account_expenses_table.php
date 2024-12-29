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
        Schema::create('account_expenses', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('approved')->default(0);
            $table->bigInteger('department_id')->nullable();
            $table->bigInteger('account_expense_category_id')->nullable();
            $table->bigInteger('amount')->nullable();
            $table->date('date')->nullable();
            $table->string('selected_month')->nullable();
            $table->integer('folio')->unsigned()->nullable();
            $table->bigInteger('creator')->unsigned()->nullable();
            $table->string('slug', 50)->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });

        Schema::create('account_expense_support_table', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('expense_id')->nullable();
            $table->bigInteger('account_log_id')->nullable();
            $table->bigInteger('account_expense_category_id')->nullable();
            $table->bigInteger('department_id')->nullable();
            $table->string('name', 100)->nullable();
            $table->string('creator_name', 100)->nullable();
            $table->string('reason', 100)->nullable();
            $table->text('description', 100)->nullable();
            $table->tinyInteger('approved_by_admin')->default(0);
            $table->tinyInteger('approved_by_sp_bm')->default(0);
            $table->tinyInteger('approved_by_bm')->default(0);
            $table->tinyInteger('approved_by_cp')->default(0);
            $table->tinyInteger('is_canceled')->default(0);
            $table->bigInteger('cancel_by')->nullable();
            $table->bigInteger('amount')->nullable();
            $table->text('amount_in_text')->nullable();
            $table->bigInteger('image_id')->nullable();
            $table->text('cancel_comment')->nullable();
            $table->date('date')->nullable();
            $table->integer('folio')->unsigned()->nullable();
            $table->bigInteger('creator')->unsigned()->nullable();
            $table->string('slug', 50)->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });

        Schema::create('account_expense_support_image_table', function (Blueprint $table) {
            $table->id();
            $table->text('url')->nullable();
            $table->bigInteger('creator')->unsigned()->nullable();
            $table->string('slug', 50)->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });

        Schema::create('account_expense_months', function (Blueprint $table) {
            $table->id();
            $table->string('month', 20)->nullable();
            $table->tinyInteger('active')->default(0);
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
        Schema::dropIfExists('account_expenses');
        Schema::dropIfExists('account_expense_support_table');
        Schema::dropIfExists('account_expense_months');
    }
};
