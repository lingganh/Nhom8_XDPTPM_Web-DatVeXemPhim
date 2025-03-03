<?php

namespace Database\Factories;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChucVu extends Migration
{
    public function up()
    {
        Schema::create('chuc_vu', function (Blueprint $table) {
            $table->string('idCV', 50)->primary();
            $table->string('tenCV', 50)->nullable();
            $table->decimal('salary', 15, 2)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chuc_vu');
    }
}
