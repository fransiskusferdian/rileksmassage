<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{

    protected $fillable = [
        'name', 'position', 'intro', 'image','email', 'site', 'instagram', 'facebook', 'twitter', 'linkedin', 'youtube', 'otherlink'
    ];

    protected $hidden = [

    ];
}
