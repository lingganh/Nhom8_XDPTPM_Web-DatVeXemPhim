<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{

    //Model dùng để tương tác csdl
    use HasFactory;
    protected $primaryKey = 'M_id';
    protected $keyType = 'string';
    protected $table = 'phim'; // Đảm bảo model liên kết với đúng bảng
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = ['tenPhim', 'thoiLuong','Poster', 'Trailer', 'moTa']; // Thêm các trường bạn muốn cho phép gán giá trị

    public function lichChieu()
    {
        return $this->hasMany(LichChieu::class, 'M_id', 'idLC');
    }
}
