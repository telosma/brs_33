<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookRequest extends Model
{
    protected $table = 'book_requests';
    protected $fillable = [
        'user_id', 'book_id', 'accepted',
    ];
}
