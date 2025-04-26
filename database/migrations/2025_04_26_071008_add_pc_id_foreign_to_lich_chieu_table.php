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
        Schema::table('lich_chieu', function (Blueprint $table) {
            $table->foreign('PC_id')
                ->references('PC_id')
                ->on('phong_chieu')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lich_chieu', function (Blueprint $table) {
            $table->dropForeign(['PC_id']);
        });
    }
};
