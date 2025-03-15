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
        Schema::create('phim', function (Blueprint $table) {
            $table->char('M_id', 5)->primary();
            $table->string('tenPhim', 100)->nullable();
            $table->integer('thoiLuong')->nullable(); // Assuming as integer
             $table->string('trangThai', 50)->nullable();
            $table->string('Poster', 2048)->nullable();
            $table->string('Trailer', 100)->nullable();
            $table->string('moTa', 1000)->nullable();
            $table->string('imgBanner', 2048)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phim');
    }
};
