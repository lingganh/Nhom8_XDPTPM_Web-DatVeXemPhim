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
            $table->char('idVe', 5)->primary();
            $table->char('idLC', 5);
            $table->string('idGhe', 5);
            $table->decimal('giaVe', 15, 2)->nullable();
            $table->string('trangThai', 50)->nullable();
            $table->timestamps(); // Thêm cột timestamps (created_at và updated_at)

            // Thêm khóa ngoại cho idLC (liên kết với bảng lich_chieu)
            $table->foreign('idLC')->references('idLC')->on('lich_chieu')->onDelete('cascade');

            // Thêm khóa ngoại cho idGhe (liên kết với bảng ghe)
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
