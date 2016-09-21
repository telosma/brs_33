<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserFollow extends Model
{
    protected $table = 'user_follows';
    protected $fillable = [
        'follower_id', 'following_id',
    ];

    public static function deleteFollow($follower_id, $following_id)
    {
        $relation = UserFollow::where('follower_id', $follower_id)->where('following_id', $following_id)->first();

        return $relation->delete();
    }
}
