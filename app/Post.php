<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{    
    protected $fillable = [
        'title', 'ingredients', 'description', 'method', 'category_id', 'user_id'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function likes()
    {
        return $this->belongsToMany('App\User', 'likes');
    }

    public function comments()
    {
        return $this->belongsToMany('App\User', 'comments');
    }

}
