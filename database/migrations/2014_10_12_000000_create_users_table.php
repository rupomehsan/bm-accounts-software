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
        // Schema::create('users', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('full_name');
        //     $table->string('email')->unique();
        //     $table->string('password');
        //     $table->string('uid');
        //     $table->string('telegram_name');
        //     $table->string('telegram_id');
        //     $table->string('image');
        //     $table->bigInteger('creator')->unsigned()->nullable();
        //     $table->string('slug', 50)->nullable();
        //     $table->enum('status', ['active', 'inactive'])->default('active');
        //     $table->timestamp('email_verified_at')->nullable();
        //     $table->rememberToken();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('users');
    }
};
