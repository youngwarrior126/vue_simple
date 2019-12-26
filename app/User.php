<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    //
    protected $table = 'users';
    protected $primarykey = 'username';
    protected $fillable = [
        'username',
        'email',
        'password',
        'fullname',
        'phone',
        'role_id'
    ];
}
