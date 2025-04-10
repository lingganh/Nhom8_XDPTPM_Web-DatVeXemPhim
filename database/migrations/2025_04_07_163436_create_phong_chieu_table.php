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
        Schema::create('phong_chieu', function (Blueprint $table) {
            $table->increments('PC_id');
            $table->string('ten_phong')->nullable();
            $table->integer('so_luong_ghe')->nullable();
            $table->string('loai_phong')->nullable();
            $table->string('mo_ta')->nullable();
            $table->integer('trang_thai')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phong_chieu');
    }
};
