<?php

namespace Database\Factories;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PhongChieu extends Migration
{
    public function up(): void
    {
        Schema::create('phong_chieu', function (Blueprint $table) {
            $table->char('PC_id', 5)->primary();
            $table->string('tenPhong', 50)->nullable();
            $table->integer('soLuongGhe')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('phong_chieu');
    }
}
