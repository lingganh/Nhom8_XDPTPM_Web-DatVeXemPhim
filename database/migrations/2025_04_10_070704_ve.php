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
            $table->id('idVe')->primary();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key cho bảng users
            $table->foreignId('idLC') ;

            $table->string('PC_id'); // Foreign key cho bảng phòng chiếu (kiểu dữ liệu phải khớp với bảng ghe)
            $table->string('idG'); // Foreign key cho bảng ghế (kiểu dữ liệu phải khớp với bảng ghe)
            $table->decimal('giaVe')->nullable();
            $table->string('trangThai')->nullable();

            $table->foreign('idLC')->references('idLC')->on('lich_chieu')->onDelete('cascade');
            $table->foreign(['idG', 'PC_id'])->references(['idG', 'PC_id'])->on('ghe')->onDelete('cascade');
            $table->timestamps();
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
