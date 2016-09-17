<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Hash;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'gender', 'password', 'avatar_link', 'is_admin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function followings()
    {
        return $this->belongsToMany('App\Models\User', 'user_follows', 'follower_id', 'following_id');
    }

    public function isAdmin()
    {
        return $this->is_admin;
    }

    public function followers()
    {
        return $this->belongsToMany('App\Models\User', 'user_follows', 'following_id', 'follower_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Commment', 'user_id');
    }

    public function reviews()
    {
        return $this->hasMany('App\Models\Review', 'user_id');
    }

    public function favoriteBooks()
    {
        return $this->belongsToMany('App\Models\Book', 'favorites');
    }

    public function readBooks()
    {
        return $this->belongsToMany('App\Models\Book', 'favorites')->where('action', config('common.read'));
    }

    public function readingBooks()
    {
        return $this->belongsToMany('App\Models\Book', 'favorites')->where('action', config('common.reading'));
    }

    public function bookRequests()
    {
        return $this->belongsToMany('App\Models\Book', 'book_request');
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst($value);
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
