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
        Schema::create('khach_hang', function (Blueprint $table) {
            $table->char('KH_id', 5)->primary();
            $table->string('TenKH', 50)->nullable();
            $table->string('GioiTinh', 3)->nullable();
            $table->char('CCCD', 11)->nullable();
            $table->string('diaChi', 100)->nullable();
            $table->date('birthday')->nullable();
            $table->char('SDT', 10)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('khach_hang');
    }
};
