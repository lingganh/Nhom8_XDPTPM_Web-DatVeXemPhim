<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CT_HoaDon extends Model
{
    protected $table = 'ct_hoa_don';
    protected $primaryKey = 'idCTHD'; // Nếu có một khóa chính khác
    public $incrementing = false; // Vì idHD là VARCHAR
    protected $keyType = 'string'; // Khóa chính là VARCHAR
    public $timestamps = false; // Nếu không có created_at, updated_at

}

