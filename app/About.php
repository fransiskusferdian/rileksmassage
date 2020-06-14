<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{

    protected $fillable = [
        'title', 'summary', 'content', 'image'
    ];

    protected $hidden = [

    ];
}
