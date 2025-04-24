<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhongChieu extends Model
{
    use HasFactory;
    protected $table = 'phong_chieu';
    protected $primaryKey = 'PC_id';

}
