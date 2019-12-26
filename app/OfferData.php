<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfferData extends Model
{
    //
    protected $table = 'offer_datas';
    protected $primarykey = 'id';
    protected $fillable = [
        'offer_name',
        'offer_link',
        'ip',
        'user_agent',
        'screen_resolution',
        'profile_data_id',
        // 'usage_type',
        // 'comments',
        'created_by',
    ];
}
