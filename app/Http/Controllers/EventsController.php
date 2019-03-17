<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Storage;
use File;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        $events = Event::all();
        return view('frontend.getting_started.pages.events',
                        ['events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.getting_started.pages.create_events');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'eventTitle' => 'required|max:60|unique:events,title',
            'description' => 'required',
            'eventImg' => 'required|image',
            'eventVenue' => 'required',
            'eventDate' =>'required',
            'eventTime' => 'required'

        ]);

        $event = new Event;
        $event->title = ucwords($request->eventTitle);
        $event->description = $request->description;
        $event->eventVenue = $request->eventVenue;
        $event->eventDate = $request->eventDate;
        $event->eventTime = $request->eventTime;
       //Image setup will be here
        if($request->hasFile('eventImg')){
            $image = $request->file('eventImg');
            $filename = strtolower($request['eventTitle']).'.' . $image->getClientOriginalExtension();

             $location = storage_path($filename);
            Storage::disk('local')->put('public/events/'.$filename, File::get($image));

            
            $event->image = $filename;

        }

       if($event->save()){
        session()->flash('success' , "Your event has been successfully created!");
       }

        $event = Event::all();
        return view('frontend.getting_started.pages.events',
                        ['events' => $event]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)

    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return 'editted';
    }
   /* public function getEvents()
    {
        return view('frontend.getting_started.pages.events');
    } */
    public function getCreateEvent(){
        return view('frontend.getting_started.pages.create_events');
    }
    public function getEventImage($filename)
    {
        // dd($filename);
   
        $file = Storage::disk('local')->get('public/events/'.$filename);
        return new Response($file, 200);    
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
 
     

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
