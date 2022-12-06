<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**

 * @property \Illuminate\Database\Eloquent\Collection $binhluan hasMany
   
 */
class Hoadon extends Model
{
    use SoftDeletes;

    protected $table = 'hoadonbanhang';

    protected $primaryKey = 'ID';

    public $errors = [];
    public $timestamps = true;
    protected $dates = [];
    protected $filltable = [
        'id_sanpham',
        'id_nguoidung',
        'soluong',
        'ngay', 'id_trangthai', 'id_cuahang',
        'diachiNH', 'tenNH', 'sdtNH',
        'created_at'


    ];
    public function sanpham()
    {
        return $this->belongsTo(SanPham::class, 'id_sanpham');
    }
    public function cuahang()
    {
        return $this->belongsTo(User::class, 'id_cuahang');
    }
    public function nguoidung()
    {
        return $this->belongsTo(User::class, 'id_nguoidung');
    }
    public function trangthai()
    {
        return $this->belongsTo(Trangthai::class, 'id_trangthai');
    }
    public function trahang()
    {
        return $this->hasOne(Trahang::class);
    }
}
