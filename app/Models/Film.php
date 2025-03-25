<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{

    //Model dùng để tương tác csdl
    use HasFactory;

    protected $table = 'phim'; // Đảm bảo model liên kết với đúng bảng

    protected $fillable = ['tenPhim', 'thoiLuong','Poster', 'Trailer', 'moTa']; // Thêm các trường bạn muốn cho phép gán giá trị

    public function lichChieu(): HasMany //Quan he nhieu nhieu voi lich chieu
    {
        return $this->hasMany(LichChieu::class, 'M_id', 'idLC');
    }
}
