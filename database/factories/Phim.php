<?php

namespace Database\Factories;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Phim extends Migration
{
    public function up(): void
    {
        Schema::create('phim', function (Blueprint $table) {
            $table->char('M_id', 5)->primary();
            $table->string('tenPhim', 100)->nullable();
            $table->integer('thoiLuong')->nullable(); // Assuming as integer
            $table->text('moTa')->nullable();
            $table->string('trangThai', 50)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('phim');
    }
}
