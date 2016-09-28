<?php

namespace  App\Providers;

use App\Models\UserFollow;
use App\Models\LikeEvent;

class UserService
{
    public static function checkFollowed($followerId, $followingId)
    {
        $result = UserFollow::where('follower_id', $followerId)->where('following_id', $followingId)->first();

        return $result ? true : false;
    }

    public static function checkLiked($reviewId, $userId)
    {
        $result = LikeEvent::where('review_id', $reviewId)->where('user_id', $userId)->first();

        return $result ? true : false;
    }
}
