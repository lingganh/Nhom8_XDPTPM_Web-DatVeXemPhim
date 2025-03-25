<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;
    protected $table = 'phim';
    protected $primaryKey = 'M_id';
    public $incrementing = false;
    protected $keyType = 'char';
    protected $fillable = ['M_id', 'tenPhim', 'thoiLuong', 'trangThai', 'Poster', 'Trailer', 'moTa', 'imgBanner'];

}
