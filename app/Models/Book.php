<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $fillable = [
        'id',
        'title',
        'author',
        'num_page',
        'description',
        'category_id',
        'num_favorite',
        'avg_rate_point',
        'published_at',
    ];
    protected $dates = [
        'published_at',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function reviews()
    {
        return $this->hasMany('App\Models\Review', 'book_id');
    }

    public function rates()
    {
        return $this->hasMany('App\Models\Rate', 'book_id');
    }
}
