<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    public function course()
    {
    	return $this->hasMany(Course::class);
    }

    public function user(){
    	return $this->belongsTo(User::class);
    }
}
