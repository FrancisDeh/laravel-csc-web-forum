<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coursename extends Model
{
    public function course()
    {
    	return $this->hasOne(Course::class);
    }
}
