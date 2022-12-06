<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**

 * @property \Illuminate\Database\Eloquent\Collection $binhluan hasMany
   
 */
class Tintuc extends Model
{
    use SoftDeletes;

    protected $table = 'tintuc';

    protected $primaryKey = 'id';

    public $errors = [];
    public $timestamps = true;
    protected $dates = [];
    protected $filltable = [
        'name',
        'noidung',
        'image',
        'loaitin'

    ];
}
