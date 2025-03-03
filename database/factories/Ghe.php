<?php

namespace Database\Factories;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ghe extends Migration
{
    public function up(): void
    {
        Schema::create('ghe', function (Blueprint $table) {
            $table->char('PC_id', 5);
            $table->char('idG', 5)->primary();
            $table->string('status', 50)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ghe');
    }
}
