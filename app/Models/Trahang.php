<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**

 * @property \Illuminate\Database\Eloquent\Collection $binhluan hasMany
   
 */
class Trahang extends Model
{
    use SoftDeletes;

    protected $table = 'trahang';

    protected $primaryKey = 'id_trahang';

    public $errors = [];
    public $timestamps = true;

    protected $filltable = [
      'id_hoadon',
      'hinhanh',
      'lido'


    ];
     /**
     * loaisanpham
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hoadon()
    {
        return $this->belongsTo(Hoadon::class, 'id_trahang');
    }
}
