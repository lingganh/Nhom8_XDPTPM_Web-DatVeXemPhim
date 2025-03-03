<?php

namespace Database\Factories;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CTPhieuNhap extends Migration
{
    public function up()
    {
        Schema::create('ct_phieu_nhap', function (Blueprint $table) {
            $table->char('idPN', 50);
            $table->char('idsp', 5);
            $table->integer('SL')->nullable();
            $table->float('donGia')->nullable();
            $table->primary(['idPN', 'idsp']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ct_phieu_nhap');
    }
}
