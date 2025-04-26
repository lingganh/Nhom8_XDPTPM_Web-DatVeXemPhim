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
        Schema::table('ghe', function (Blueprint $table) {
            $table->foreign('PC_id')
                ->references('PC_id')
                ->on('phong_chieu')
                ->onDelete('cascade'); // Hoặc tùy chọn khác
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ghe', function (Blueprint $table) {
            $table->dropForeign(['PC_id']);
        });
    }
};
