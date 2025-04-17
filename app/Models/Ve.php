<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ve extends Model
{
    //trong bảng vé có chứa pcid , mình truy xuất pcid trong lịch chiếu .
    // Từ pcid sẽ in ra các ghế . lấy ghế đã đặt bằng id Ghế
    protected $table = 've';
    protected $fillable = [
        'user_id',
        'idLC',
        'PC_id',
        'idG',
        'giaVe',
        'trangThai',
        'idHD',
        ];


    public function lichChieu()
    {
        return $this->belongsTo(LichChieu::class, 'idLC', 'idLC');
    }

    public function phongChieu()
    {
        return $this->belongsTo(PhongChieu::class, 'PC_id', 'PC_id');
    }

    public function ghe()
    {
        return $this->belongsTo(Ghe::class, ['idG', 'PC_id'], ['idG', 'PC_id']);
    }
    public function User(){
        return $this->belongsTo(User::class, ['user_id', 'id'],['user_id', 'id']);
    }
}
