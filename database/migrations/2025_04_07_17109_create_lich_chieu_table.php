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
        Schema::create('lich_chieu', function (Blueprint $table) {
            $table->id('idLC')->primary();
            $table->string('PC_id')->nullable();
            $table->unsignedInteger('M_id')->nullable();
            $table->date('ngayChieu')->nullable();
            $table->dateTime('gioBD')->nullable();
            $table->integer('thoiLuong')->nullable();
            $table->foreign('M_id')->references('M_id')->on('phim')->onDelete('cascade');
            $table->foreign('PC_id')->references('PC_id')->on('phong_chieu')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lich_chieu');
    }
};
