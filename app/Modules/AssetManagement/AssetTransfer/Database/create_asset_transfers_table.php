<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     php artisan migrate --path='\App\Modules\AssetManagement\AssetTransfer\Database\create_asset_transfers_table.php'
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('asset_transfers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('asset_id')->nullable();
            $table->bigInteger('sender_id')->nullable();
            $table->bigInteger('receiver_id')->nullable();
            $table->tinyInteger('is_accepted_by_receiver')->default(0);
            $table->date('accepted_date')->nullable();
            $table->date('request_date')->nullable();
            $table->text('desctiption')->nullable();

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
        Schema::dropIfExists('asset_transfers');
    }
};
