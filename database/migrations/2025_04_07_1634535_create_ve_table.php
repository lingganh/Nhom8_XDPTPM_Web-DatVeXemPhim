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
        Schema::create('ve', function (Blueprint $table) {
            $table->id('idVe') ->primary();
            $table->unsignedBigInteger('idLC');
            $table->string('idGhe');
            $table->decimal('giaVe')->nullable();
            $table->string('trangThai')->nullable();
            $table->timestamps();
            $table->foreign('idGhe')->references('idG')->on('ghe')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ve');
    }
};
