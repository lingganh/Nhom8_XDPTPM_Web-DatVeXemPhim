<?php

namespace Database\Factories;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ve extends Migration
{
    public function up(): void
    {
        Schema::create('ve', function (Blueprint $table) {
            $table->char('idVe', 5)->primary();
            $table->char('idLC', 5);
            $table->string('idGhe', 5);
            $table->decimal('giaVe', 15, 2)->nullable();
            $table->string('trangThai', 50)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ve');
    }
}
