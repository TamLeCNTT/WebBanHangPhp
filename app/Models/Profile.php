<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**

 * @property \Illuminate\Database\Eloquent\Collection $binhluan hasMany
   
 */
class Profile extends Model
{
    use SoftDeletes;

    protected $table = 'thongtincanhan';

    protected $primaryKey = 'id';

    public $errors = [];
    public $timestamps = true;

    protected $filltable = [
        'user_id',
        'username',
        'firstname',
        'lastname',
        'location',
        'email',
        'phone', 'avatar'


    ];
}
