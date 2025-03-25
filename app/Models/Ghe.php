<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ghe extends Model
{
    //
    use HasFactory;
    protected $table = 'ghe';
    protected $fillable = ['PC_id', 'idG', 'status'];

    public function phongChieu(): BelongsTo {
        return $this->belongsTo(PhongChieu::class, 'PC_id', 'PC_id');
    }
     public function ve(): HasMany {
        return $this->HasMany(Ve::class, 'idG', 'idG');
     }


     //Ghe hasMany Ve: Một ghế có nhiều vé (cho các suất chiếu khác nhau).
    //Ve belongsTo Ghe: Một vé thuộc về một ghế duy nhất.


    /* One to one :  hasOne ><belongsto
     *One to many :hasMany >< belongsto
     * many to many : belongsToMany()
     *
     *
     * belongsTo giúp bạn xác định "cha" của một model.
     *  Model chứa khóa ngoại sẽ sử dụng belongsTo để trỏ đến model mà khóa ngoại đó tham chiếu đến.
     *
     *
     *
     * */
}
