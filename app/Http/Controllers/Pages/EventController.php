<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests\EventRequest;

class EventController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('home');
    }
    
    public function home() 
    {
        $events = Event::where('debut', '>=', date("Y/m/d"))
            ->where('actif', true)
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
        $events = Event::where('actif', true)->get();
        
        $liste = array();
        foreach ($events as $event) {
            array_push($liste, $event->eventToArrayForCalendar());
        }
        return view('pages.event.calendar')
            ->with('HEAD_calendar', true)
            ->with('events', $liste);
    }
    
    public function detail($id) {
        $event = Event::where('id', $id)            
            ->where('actif', true)
            ->first();
        
        if ($event == null) {
            // Page inexistante
            return redirect('/404');
        }
        
        $dossier = public_path('img/event/gallery').'/'.$id;
        if (!file_exists($dossier)) {
            // Création du dossier s'il n'existe pas
            mkdir($dossier, 0777, true);
        }
        
        // Chargement de la liste des photos
        $photos = scandir($dossier);
        unset($photos[0]); // Fichier .
        unset($photos[1]); // Fichier ..
        
        return view('pages.event.detail')
            ->withEvent($event->eventToArray())
            ->withPhotos($photos);
    }
    
    public function propose() {
        return view('pages.event.propose')
            ->withUsers(null)
            ->withEvent(null)
            ->withEdit(false);
    }
    
    public function sendEvent(EventRequest $request)
    {
        $event = new Event();
        $this->validateEvent($request, $event);
        
        // Message de validation
        $message = array(
            'type' => 'success',
            'icon' => 'calendar-check-o',
            'content' => 'Votre proposition d\'évènement a bien été envoyée.'
        );
        return redirect('/')->with('message', $message);
    }
    
    protected function validateEvent(EventRequest $request, Event $event)
    {
        $event->titre = $request->titre;
        $event->user_id = $request->organisateur;
        
        // Conversion des dates
        $dateDebut = new \DateTime($request->jourDebut);
        $dateFin = new \DateTime($request->jourFin);
        if (!isset($request->journee)) {
            $heureDebut = explode(':', $request->heureDebut);
            $dateDebut->setTime($heureDebut[0], $heureDebut[1], 0, 0);
            $heureFin = explode(':', $request->heureFin);
            $dateFin->setTime($heureFin[0], $heureFin[1], 0, 0);
        }
        
        $event->journee = isset($request->journee) ? 1 : 0;
        $event->debut = $dateDebut;
        $event->fin = $dateFin;
        $event->commentaire = $request->description;
        $event->save();
        
        // Import de la photo
        if ($request->photo != null) {
            $destinationPath = public_path('img/event');
            $request->photo->move($destinationPath, $event->id.'.jpg');
        }
    }
    
}
