<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\EventRequest;

class AdminEventController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }
    
    public function events()
    {
        // Liste des évènements
        $events = Event::orderBy('debut', 'desc')->get();
        
        $liste = array();
        foreach ($events as $event) {
            array_push($liste, $event->eventToArray());
        }
        return view('admin.content.event.events')
            ->withListEvent($liste);
    }
    
    public function createEvent() 
    {
        $users = User::orderBy('nom')->get();
        
        $liste = array();
        foreach ($users as $user) {
            $liste[$user->id] = $user->prenom.' '.$user->nom;
        }
        return view('admin.content.event.event')
            ->withUsers($liste)
            ->withEvent(null)
            ->withEdit(false);
    }
    
    public function editEvent($id) {
        $event = Event::where('id', $id)->first();
        return $this->createEvent()
            ->withEvent($event->eventToArrayForAdmin())
            ->withEdit(true);
    }
    
    public function validateCreateEvent(EventRequest $request) 
    {
        $event = new Event();
        $this->validateEvent($request, $event);
        return redirect('admin/event');
    }

    public function validateEditEvent(EventRequest $request, $id)
    {
        $event = Event::where('id', $id)->first();
        $this->validateEvent($request, $event);
        return redirect('admin/event');
    }
    
    private function validateEvent(EventRequest $request, Event $event)
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
    
    public function deleteEvent($id)
    {
        Event::destroy($id);
        return redirect('admin/event');
    }
}
