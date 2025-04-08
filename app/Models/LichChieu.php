<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LichChieu extends Model
{

    //
    use HasFactory;
    protected $table = 'lich_chieu';
    protected $primaryKey = 'idLC';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = ['M_id', 'PC_id', 'ngayChieu' ,'gioBD' ,'thoiLong'];
    // Mỗi lịch chiếu thuộc về 1 phim
    public function phim()
    {
        return $this->belongsTo(Film::class, 'M_id', 'M_id');
    }
}
