<?php

namespace Database\Factories;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LichChieu extends Migration
{
    public function up(): void
    {
        Schema::create('lich_chieu', function (Blueprint $table) {
            $table->char('idLC', 5)->primary();
            $table->string('PC_id', 20)->nullable();
            $table->string('M_id', 20)->nullable();
            $table->date('ngayChieu')->nullable();
            $table->dateTime('gioBD')->nullable();
            $table->integer('thoiLong')->nullable(); // Assuming `thoiLong` is integer
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lich_chieu');
    }
}
