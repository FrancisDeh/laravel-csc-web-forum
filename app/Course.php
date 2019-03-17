<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function semester()
    {
    	return $this->belongsTo(Semester::class);
    }

    public function programme()
    {
   		return $this->belongsTo(Programme::class);
    }

    public function coursename()
    {
    	return $this->belongsTo(Coursename::class);
    }
    public function coursecode()
    {
    	return $this->belongsTo(Coursecode::class);
    }

    public function repository()
    {
    	return $this->hasMany(Repository::class);
    }

}
