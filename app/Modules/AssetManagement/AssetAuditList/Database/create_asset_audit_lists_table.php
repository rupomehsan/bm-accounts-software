<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     php artisan migrate --path='\App\Modules\AssetManagement\AssetAuditList\Database\create_asset_audit_lists_table.php'
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('asset_audit_lists', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('asset_id')->nullable();
            $table->bigInteger('asset_audit_id')->nullable();
            $table->enum('is_ok', ['yes', 'no'])->nullable();
            $table->text('comment')->nullable();

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
        Schema::dropIfExists('asset_audit_lists');
    }
};
