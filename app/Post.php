<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function category(){
    	return $this->belongsTo(Category::class);
    }

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function comments()
    {
    	return $this->morphMany(Comment::class, 'commentable');
    }

    public function likes(){
        return $this->morphMany(Like::class, 'likable');
    }
}
