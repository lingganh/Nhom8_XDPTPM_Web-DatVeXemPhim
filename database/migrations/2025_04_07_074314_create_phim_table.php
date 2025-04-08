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
            $table->unsignedInteger('M_id')->primary()->autoIncrement();
            $table->string('tenPhim')->nullable();
            $table->integer('thoiLuong')->nullable();
            $table->string('trangThai')->nullable();
            $table->string('Poster')->nullable();
            $table->string('Trailer')->nullable();
            $table->string('moTa')->nullable();
            $table->string('imgBanner')->nullable();
            $table->timestamps();

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
