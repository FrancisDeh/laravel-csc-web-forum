<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    public function course()
    {
    	return $this->hasMany(Course::class);
    }
}
