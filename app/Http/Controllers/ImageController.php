<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Storage;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function getUserImage($filename){
    $file = Storage::disk('local')->get('public/profile/'.$filename);
        return new Response($file, 200);
    }


    public function getEventImage($filename){
    $file = Storage::disk('local')->get('public/events/'.$filename);
        return new Response($file, 200);
    }

    public function getDevImage($filename){
    $file = Storage::disk('local')->get('public/devprofile/'.$filename);
        return new Response($file, 200);
    }

    public function getRead($filename){
     	$file = storage_path().'/app/public/repository/course_materials/'.$filename;
        return response()->file($file);
    } 

    public function getDownload($filename){
     	$file = storage_path().'/app/public/repository/course_materials/'.$filename;
        return response()->download($file, $filename);
    }
}

