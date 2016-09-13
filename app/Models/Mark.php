<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    protected $table = 'marks';
    protected $fillable = [
        'user_id', 'book_id', 'action',
    ];
}
