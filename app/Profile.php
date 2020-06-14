<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $fillable = [
        'name', 'address', 'link_gmap', 'email', 'phone', 'link_whatsapp', 'instagram', 'facebook', 'youtube'
    ];

    protected $hidden = [

    ];
}
