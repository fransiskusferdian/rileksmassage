<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
     protected $fillable = [
       'title', 'slug', 'summary', 'content', 'image', 'link', 'start_at', 'end_at'
    ];

    protected $hidden = [

    ];
}
