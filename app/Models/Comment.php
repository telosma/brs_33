<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = [
        'user_id', 'review_id', 'content',
    ];

    public function review()
    {
        return $this->belongsTo('App\Models\Review', 'review_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format(config('common.publish_date_format'));
    }

    public function setCreatedAtAttribute($value)
    {
        return $this->attributes['created_at'] = Carbon::createFromFormat(config('common.date_format_created'), $value);
    }
}
