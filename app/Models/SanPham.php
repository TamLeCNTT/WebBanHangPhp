<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property bigint unsigned $city_id city id
 * @property varchar $name name
 * @property timestamp $created_at created at
 * @property timestamp $updated_at updated at
 * @property timestamp $deleted_at deleted at
 * @property City $city belongsTo
 * @property \Illuminate\Database\Eloquent\Collection $ward hasMany
   
 */
class SanPham extends Model
{

    use SoftDeletes;

    /**
     * Database table name
     */
    protected $table = 'sanpham';


    /**
     * Use timestamps 
     *
     * @var boolean
     */
    public $timestamps = true;

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'id_loai',
        'id_nsx',
        'name',
        'mota',
        'image',
        'gia',
        'soluong',
        'id_cuahang',
        'giasaukhuyenmai'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [];

    /**
     * loaisanpham
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function loaisanpham()
    {
        return $this->belongsTo(LoaiSanPham::class, 'id_loai');
    }
    public function noisanxuat()
    {
        return $this->belongsTo(NhaSanXuat::class, 'id_nsx');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_cuahang');
    }
    /**
     * wards
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function khuyenmai()
    {
        return $this->hasMany(Khuyenmai::class, 'id_sanpham');
    }
    public function nhaphang()
    {
        return $this->hasOne(Nhaphang::class, 'id_sanpham');
    }
    public function binhluan()
    {
        return $this->hasMany(Binhluan::class, 'id_sanpham');
    }
    public function danhgia()
    {
        return $this->hasMany(DanhGia::class, 'id_sanpham');
    }
    public function hoadon()
    {
        return $this->hasMany(Hoadon::class, 'id_sanpham');
    }
}
