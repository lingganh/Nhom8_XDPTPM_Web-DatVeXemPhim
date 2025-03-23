<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    use HasFactory;

    protected $table = 'hoa_don'; // Nếu bảng tên 'hoa_don', đặt đúng tên
    protected $primaryKey = 'idHD'; // Nếu khóa chính không phải 'id'
    public $timestamps = false; // Nếu bảng không có created_at, updated_at

    protected $fillable = ['idKH', 'tongTien', 'NgayXuat'];
}
