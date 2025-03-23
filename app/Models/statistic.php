<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class statistic extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    'Ngaydat', 'Doanhso', 'Lai', 'Soluongdaban', 'Tongdon' ];
    protected $primarykey = 'id statistical';
    protected $table = 'tbl_statistical';

}
