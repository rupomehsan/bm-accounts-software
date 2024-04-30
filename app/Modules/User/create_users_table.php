<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('parent')->nullable();
            $table->string('full_name')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('phone')->nullable();
            $table->string('uid')->nullable();
            $table->string('telegram_name')->nullable();
            $table->string('telegram_id')->nullable();
            $table->string('image')->default('avatar.png');
            $table->bigInteger('creator')->unsigned()->nullable();
            $table->string('slug', 50)->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->tinyInteger('is_blocked')->default(0);
            $table->integer('no_of_attempt')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('user_user_role', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('user_role_id')->nullable();
            $table->timestamps();
        });

        Schema::create('user_user_permission', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('user_permission_id')->nullable();
            $table->timestamps();
        });
        Schema::create('depertment_members', function (Blueprint $table) {
            $table->id();
            $table->string('full_name', 100)->nullable();
            $table->bigInteger('department_id')->nullable()->comment('user_id');
            $table->string('mobile_number')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->string('telegram_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('user_user_role');
        Schema::dropIfExists('user_user_permission');
    }
};
