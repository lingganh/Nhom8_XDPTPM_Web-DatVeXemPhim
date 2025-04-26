<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhongChieu extends Model
{
    use HasFactory;
    protected $table = 'phong_chieu';
    protected $primaryKey = 'PC_id';
    public $timestamps = false;

    protected $fillable = [
        'ten_phong',
        'so_luong_ghe',
        'loai_phong',
        'mo_ta',
        'trang_thai',
    ];

    // ✅ Quan hệ ngược: 1 phòng có nhiều lịch chiếu
    public function lichChieus()
    {
        return $this->hasMany(LichChieu::class, 'PC_id', 'PC_id');
    }
}
