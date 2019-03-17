<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;

class OnlineStatusController extends Controller
{
	//this makes a user appears online by setting the status online
    public function sendOnline(){
    	//set status online
    	$user = User::find(auth()->user()->id);
    	$user->online_status = 1;
    	if($user->save()){
    		return redirect()->route('posts');
    	}
    	
    }

   //registration and loguot codes are in the register and login controller
}
