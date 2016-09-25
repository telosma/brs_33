<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookRequest extends Model
{
    protected $table = 'book_requests';
    protected $fillable = [
        'user_id', 'book_id', 'accepted',
    ];

    public function book()
    {
        return $this->belongsTo('App\Models\Book', 'book_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
