<?php

namespace App\Http\Controllers;

use App\Event;

class EventController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('event');
    }
    
    public function home() 
    {
        $events = Event::where('debut', '>=', date("Y/m/d"))
            ->orderBy('debut')->paginate(4);
        
        $nextEvent = $events[0]->eventToArray();

        $listNextEvents = array();
        for ($i = 1; $i < count($events); $i++) {
            array_push($listNextEvents, $events[$i]->eventToArray());
        }

        return view('pages.event.home')
                ->withNextEvent($nextEvent)
                ->withListNextEvent($listNextEvents);
    }    
    
    public function calendar() {
        $events = Event::all();
        
        $liste = array();
        foreach ($events as $event) {
            array_push($liste, $event->eventToArrayForCalendar());
        }
        return view('pages.event.calendar')
            ->with('calendar', true)
            ->with('events', $liste);
    }
    
    public function detail($id) {
        $rqt = Event::where('id', $id)->get();
        
        if ($rqt->count() == 0) {
            // Page inexistante
        }
        
        $event = $rqt->first();
        return view('pages.event.detail')
            ->withEvent($event->eventToArray());
    }
    
}
