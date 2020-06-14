<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'image', 'title', 'summary', 'link'
    ];

    protected $hidden = [

    ];
}
