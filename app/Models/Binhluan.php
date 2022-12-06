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
class Binhluan extends Model
{
    use SoftDeletes;

    protected $table = 'binhluan';

    protected $primaryKey = 'ID';

    public $errors = [];
    public $timestamps = true;

    protected $filltable = [
        'id_sanpham',
        'id_nguoidung',
        'noidungbinhluan'
        
    ];
 
    /**
     * city
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nguoidung()
    {
        return $this->belongsTo(User::class, 'id_nguoidung');
    }
    public function sanpham()
    {
        return $this->belongsTo(SanPham::class,'id_sanpham');
    }
}