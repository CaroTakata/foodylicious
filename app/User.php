<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'gender', 'avatar',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function following()
    {
        return $this->belongsToMany('App\User', 'followers', 'user_id', 'follow_id');
    }
    
    public function followers()
    {
        return $this->belongsToMany('App\User', 'followers', 'follow_id', 'user_id');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function likes()
    {
        return $this->belongsToMany('App\Post', 'likes');
    }

    public function comments()
    {
        return $this->belongsToMany('App\Post', 'comments');
    }
}
