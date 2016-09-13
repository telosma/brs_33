<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';
    protected $fillable = [
        'user_id', 'book_id', 'body',
    ];

    public function comments()
    {
        return $this->hasMany('App\Models\Commment', 'user_id');
    }

    public function likeEvents()
    {
        return $this->hasMany('App\Models\LikeEvent', 'review_id');
    }

    public function usersLikes()
    {
        return $this->belongsToMany('App\Models\User', 'like_events');
    }
}
