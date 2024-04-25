<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     php artisan migrate --path='\App\Modules\AssetManagement\AssetLost\Database\create_asset_losts_table.php'
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('asset_losts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('asset_id')->nullable();
            $table->text('lost_reason')->nullable();
            $table->string('lost_from_user')->nullable();
            $table->string('lost_from_user_contact')->nullable();
            $table->date('lost_date')->nullable();

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
        Schema::dropIfExists('asset_losts');
    }
};
