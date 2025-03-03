<?php

namespace Database\Factories;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CTHoaDon extends Migration
{
    public function up()
    {
        Schema::create('ct_hoa_don', function (Blueprint $table) {
            $table->char('idHD', 5);
            $table->char('idsp', 5);
            $table->integer('SL')->nullable();
            $table->float('donGia')->nullable();
            $table->primary(['idHD', 'idsp']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ct_hoa_don');
    }
}
