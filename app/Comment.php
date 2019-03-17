<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function commentable()
    {
    	return $this->morphTo();
    }

    public function reply(){
    	return $this->morphMany(Comment::class, 'commentable');
    }

    public function likes(){
    	return $this->morphMany(Like::class, 'likable');
    }

    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }

     public function user(){
        return $this->belongsTo(User::class);
    }
}
