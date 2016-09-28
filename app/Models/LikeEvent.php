<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LikeEvent extends Model
{
    protected $table = 'like_events';
    protected $fillable = [
        'user_id', 'review_id',
    ];

    public static function deleteLike($reviewId, $userId)
    {
        $liked = LikeEvent::where('review_id', $reviewId)->where('user_id', $userId)->first();

        return $liked->delete();
    }
}
