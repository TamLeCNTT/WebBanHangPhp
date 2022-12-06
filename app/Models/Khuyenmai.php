<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**

 * @property \Illuminate\Database\Eloquent\Collection $binhluan hasMany
   
 */
class Khuyenmai extends Model
{
    use SoftDeletes;

    protected $table = 'khuyenmai';
    public $timestamps = true;

    protected $dates = [];

    protected $filltable = [
        'name',
        'phantramkhuyenmai',
        'id_sanpham',
        'id_cuahang',
        'NgayBD',
        'NgayKT'
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
