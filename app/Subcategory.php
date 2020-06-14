<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $table = 'sub_categories';


    protected $fillable = [
        'name', 'category_id'
    ];

    protected $hidden = [

    ];
}
