<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coursecode extends Model
{
    public function course()
    {
    	return $this->hasOne(Course::class);
    }
}
