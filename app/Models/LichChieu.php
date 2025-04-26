<?php

namespace App\Models;
use Carbon\Carbon;
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
    protected $fillable = ['M_id', 'PC_id', 'ngayChieu' ,'gioBD' ,'thoiLuong'];
    protected $dates = ['ngayChieu', 'gioBD'];
    public function phim()
    {
        return $this->belongsTo(Film::class, 'M_id', 'M_id');
    }
    public function phongChieu()
    {
        return $this->belongsTo(PhongChieu::class, 'PC_id', 'PC_id');
    }
    public function getPhanLoaiAttribute()
    {
        $today = \Carbon\Carbon::today();


        $ngayChieu = \Carbon\Carbon::parse($this->ngayChieu);

        if ($ngayChieu->lt($today)) {
            return 'Đã chiếu';
        } elseif ($ngayChieu->eq($today)) {
            return 'Đang chiếu';
        } else {
            return 'Sắp chiếu';
        }
    }
}
