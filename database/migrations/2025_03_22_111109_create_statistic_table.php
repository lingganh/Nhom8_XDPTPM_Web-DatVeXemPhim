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
        Schema::create('statistic', function (Blueprint $table) {
            $table->id(); // ID tự động tăng
            $table->date('Ngaydat'); // Ngày đặt hàng
            $table->decimal('Doanhso', 15, 2); // Doanh số (Số thập phân)
            $table->decimal('Lai', 15, 2); // Lợi nhuận
            $table->integer('Soluongdaban'); // Số lượng đã bán
            $table->integer('Tongdon'); // Tổng đơn hàng
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistic');
    }
};
