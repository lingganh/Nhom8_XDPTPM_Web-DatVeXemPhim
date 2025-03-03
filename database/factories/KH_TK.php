<?php

namespace Database\Factories;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KH_TK extends Migration
{
    public function up(): void
    {
        Schema::create('kh_tk', function (Blueprint $table) {
            $table->char('KH_id', 5);
            $table->string('idTK', 20);
            $table->primary(['KH_id', 'idTK']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kh_tk');
    }
}
