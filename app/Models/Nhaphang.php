<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**

 * @property \Illuminate\Database\Eloquent\Collection $binhluan hasMany
   
 */
class Nhaphang extends Model
{
    use SoftDeletes;

    protected $table = 'hoadonnhaphang';
    public $timestamps = true;

    protected $primaryKey = 'id_nhaphang';
    protected $dates = [];

    protected $filltable = [
       
        'id_sanpham',
        'id_cuahang',
        'ngaynhap',
        'soluong',
        'gia'
    ];


    /**
     * loaisanpham
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sanpham()
    {
        return $this->belongsTo(SanPham::class, 'id_sanpham');
    }
}
