<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileData extends Model
{
    //
    protected $table = 'profile_datas';
    protected $primarykey = 'id';
    protected $fillable = [
        'name',
        'username',
        'email_address',
        'password',
        'address',
        'birthday',
        'city',
        'state',
        'country',
        'zip_code',
        'phone',
        'created_by',
        // 'comments',
    ];
}
