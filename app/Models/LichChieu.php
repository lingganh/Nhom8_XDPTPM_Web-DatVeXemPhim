<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LichChieu extends Model
{

    //
    use HasFactory;
    protected $table = 'lich_chieu';
    protected $fillable = ['M_id', 'PC_id', 'ngayChieu' ,'gioBD' ,'thoiLong'];
    public function phim(): HasMany //Quan he nhieu nhieu voi lich chieu
    {
        return $this->hasMany( Film::class, 'M_id', 'M_id');
    }
}
