<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**

 * @property \Illuminate\Database\Eloquent\Collection $binhluan hasMany
   
 */
class User extends Model
{
    use SoftDeletes;

    protected $table = 'nguoidung';

    protected $primaryKey = 'id_nguoidung';

    public $errors = [];
    public $timestamps = true;

    protected $filltable = [
        'username',
        'password',

        'quyenSD',
        'id_loaihang'

    ];
    /**
     * wards
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function binhluan()
    {
        return $this->hasMany(Binhluan::class, 'id_nguoidung');
    }
    public function hoadon()
    {
        return $this->hasMany(Hoadon::class, 'id_nguoidung');
    }
    public function hoadoncuahang()
    {
        return $this->hasMany(Hoadon::class, 'id_cuahang');
    }
    public function sanpham()
    {
        return $this->hasMany(SanPham::class, 'id_cuahang');
    }
    public function chatnguoigui()
    {
        return $this->hasMany(Chat::class, 'id_nguoigui');
    }
    public function chatnguoinhan()
    {
        return $this->hasMany(Chat::class, 'id_nguoinhan');
    }
    public function quyen()
    {
        return $this->belongsTo(Quyen::class, 'ID_quyen');
    }
    public function loaisanpham()
    {
        return $this->belongsTo(LoaiSanPham::class, 'id_loaihang');
    }
}
