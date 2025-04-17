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
        Schema::create('ct_hoa_don', function (Blueprint $table) {
            $table->string('idHD');
            $table->string('idsp');
            $table->integer('SL')->nullable();
            $table->float('donGia')->nullable();
            $table->primary(['idHD', 'idsp']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ct_hoa_don');
    }
};
