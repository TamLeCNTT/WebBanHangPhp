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
class Chat extends Model
{
    use SoftDeletes;

    protected $table = 'trochuyen';

    protected $primaryKey = 'id_chat';

    public $errors = [];
    public $timestamps = true;

    protected $filltable = [
        'id_nguoigui',
        'id_nguoinhan',
        'noidung',
        'trangthai'

    ];

    /**
     * city
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nguoigui()
    {
        return $this->belongsTo(User::class, 'id_nguoigui');
    }
    public function nguoinhan()
    {
        return $this->belongsTo(User::class, 'id_nguoinhan');
    }
}
