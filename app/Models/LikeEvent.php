<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LikeEvent extends Model
{
    protected $table = 'like_events';
    protected $fillable = [
        'user_id', 'review_id',
    ];
}
