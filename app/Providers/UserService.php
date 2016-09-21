<?php

namespace  App\Providers;

use App\Models\UserFollow;

class UserService
{
    public static function checkFollowed($follower_id, $following_id)
    {
        $result = UserFollow::where('follower_id', $follower_id)->where('following_id', $following_id)->first();

        return $result ? true : false;
    }
}
