<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgrammingLanguage extends Model
{
    public function user(){
    	return $this->belongsToMany(User::class);
    }
}
