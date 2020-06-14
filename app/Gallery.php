<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'portfolio_galleries';

    protected $fillable = [
        'image', 'directory', 'is_thumbnail', 'sub_category_id'
    ];

    protected $hidden = [

    ];

    public function category() 
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function portfolio() 
    {
        return $this->belongsTo(Portfolio::class, 'directory', 'directory');
    }
}
