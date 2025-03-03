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
        Schema::create('nhan_vien', function (Blueprint $table) {
            $table->char('NV_id', 5)->primary();
            $table->string('TenNV', 50)->nullable();
            $table->string('gioiTinh', 3)->nullable();
            $table->date('ngaySinh')->nullable();
            $table->char('CCCD', 12)->nullable();
            $table->string('diaChi', 100)->nullable();
            $table->char('SDT', 10)->nullable();
            $table->string('idCV', 50);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nhan_vien');
    }
};
