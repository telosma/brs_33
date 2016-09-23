<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';
    protected $fillable = [
        'user_id', 'book_id', 'content',
    ];

    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'user_id');
    }

    public function likeEvents()
    {
        return $this->hasMany('App\Models\LikeEvent', 'review_id');
    }

    public function usersLikes()
    {
        return $this->belongsToMany('App\Models\User', 'like_events');
    }

    public function book()
    {
        return $this->belongsTo('App\Models\Book', 'book_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function delete()
    {
        try {
            parent::delete();
            $this->comments()->delete();

            return true;
        } catch (\Exception $ex) {
            return false;
        }
    }
}
