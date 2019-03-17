<?php

namespace App\Http\Controllers;
use App\User;
use App\ProgrammingLanguage;
use Illuminate\Http\Request;

class AllUsersController extends Controller
{
    public function getAllUsersPage(){

    	$users = User::orderBy('fname')->get();

    	return view('frontend.chatroom.pages.allusers')->withUsers($users);
    }

    public function getUsersByProgramme($name, $id){
    
    	$users = User::where('programme_id', $id)->get();
    	$message = "<\ " . $name . ">";
    	return view('frontend.chatroom.pages.allusers')->withUsers($users)->withMessage($message);
    }

    public function getUsersByGender($gender){
    	//holds full word for gender
    	$fullgender;
    	$users = User::where('gender', $gender)->get();

    	switch ($gender) {
    		case 'm':
    			$fullgender = "Males";
    			break;
    		case 'f':
    			$fullgender = "Females";
    			break;
    		default:
    			# code...
    			break;
    	}

    	$message = "<\All ". $fullgender . ">";
    	return view('frontend.chatroom.pages.allusers')->withUsers($users)->withMessage($message);
    }

    public function getUsersByLevel($level){
    
    	$users = User::where('level', $level)->get();
    	$message = "<\All Level ". $level. ">";
    	return view('frontend.chatroom.pages.allusers')->withUsers($users)->withMessage($message);
    }

    public function getUsersByLanguage($name, $id){
    
    	$users = ProgrammingLanguage::find($id)->user;

    	$message = "<\All " . $name . " Programmers>";
    	return view('frontend.chatroom.pages.allusers')->withUsers($users)->withMessage($message);
    }

        //this function will return search hits
    public function searchUser(Request $request){
    	$term = $request->term;

         $user = User::where('fname', 'LIKE', '%' . $term . '%')
            					->orWhere('sname', 'LIKE', '%'. $term . '%')
            					->get();


        	if(count($user) == 0)
            {
        		$searchResult[] =  "No item Found";
        	} else
            {
        		foreach ($user as $key => $value)
                {

                    $searchResult[] = $value->sname;
        		}
        	}
        
    	return $searchResult;
    }

    /*this function displays search page with possible hits*/
       public function searchUserHits(Request $request){

        $value = $request->searchTerm;
        

         $users = User::where('fname','LIKE', '%'. $value .'%')->orWhere('sname', 'LIKE', '%'. $value . '%')->orderBy('fname')->get();
        
    
       $message = "<\Search Matching " . $value . ">";
    	return view('frontend.chatroom.pages.allusers')->withUsers($users)->withMessage($message);
       }
}
