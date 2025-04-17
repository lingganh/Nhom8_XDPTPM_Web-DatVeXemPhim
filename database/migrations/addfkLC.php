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
        Schema::create('lich_chieu', function (Blueprint $table) {

            $table->foreign('PC_id')->references('PC_id')->on('phong_chieu')->onDelete('set null');

        });
        Schema::create('ct_hoa_don', function (Blueprint $table) {

            $table->foreign('idHD')->references('idHD')->on('hoa_don')->onDelete('cascade');
            $table->foreign('idsp')->references('idsp')->on('san_pham')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lich_chieu');
    }
};
