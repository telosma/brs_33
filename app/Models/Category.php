<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'name', 'category_parent_id',
    ];

    public function books()
    {
        return $this->hasMany('App\Models\Book', 'category_id');
    }
}
