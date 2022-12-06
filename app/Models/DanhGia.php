<?php
namespace App\Models;

use App\Models\User as ModelsUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**

* @property int unsigned $id_sanpham sanpham id
 * @property \Illuminate\Database\Eloquent\Collection $user belongsTo
   * @property \Illuminate\Database\Eloquent\Collection $sanpham belongsTo
 */
class DanhGia extends Model
{
    use SoftDeletes;

    protected $table = 'danhgia';

    protected $primaryKey = 'id_danhgia';

    public $errors = [];
    public $timestamps = true;

    protected $filltable = [
        'id_sanpham',
        'id_nguoidung',
        'binhluan',
        'sosao'
        
    ];
 
    /**
     * city
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sanpham()
    {
        return $this->belongsTo(SanPham::class,'id_sanpham');
    }
}