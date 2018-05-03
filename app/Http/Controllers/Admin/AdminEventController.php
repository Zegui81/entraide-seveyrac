<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\EventRequest;
use Illuminate\Http\Request;

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
        
        // Message de validation
        $message = array(
            'type' => 'success',
            'icon' => 'calendar-check-o',
            'content' => 'L\'évènement a été créé avec succés.'
        );
        
        return redirect('admin/event')->with('message', $message);
    }

    public function validateEditEvent(EventRequest $request, $id)
    {
        $event = Event::where('id', $id)->first();
        $this->validateEvent($request, $event);
        
        // Message de validation
        $message = array(
            'type' => 'success',
            'icon' => 'calendar-check-o',
            'content' => 'L\'évènement a été édité avec succés.'
        );
        return redirect('admin/event')->with('message', $message);
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
        
        // Message de validation
        $message = array(
            'type' => 'warning',
            'icon' => 'calendar-times-o',
            'content' => 'L\'évènement a été supprimé avec succés.'
        );
        return redirect('admin/event')->with('message', $message);
    }
    
    public function gallery($id)
    {
        $event = Event::where('id', $id)->first();
        
        $dossier = public_path('img/event/gallery').'/'.$id;
        if (!file_exists($dossier)) {
            // Création du dossier s'il n'existe pas
            mkdir($dossier, 0777, true);
        }
        
        // Chargement de la liste des photos
        $photos = scandir($dossier);
        unset($photos[0]); // Fichier .
        unset($photos[1]); // Fichier ..
        
        return view('admin.content.event.gallery')
            ->withEvent($event->eventToArray())
            ->withPhotos($photos);
    }
    
    public function addPhoto(Request $request, $id)
    {        
        // Import de la photo
        if ($request->file != null) {
            $destinationPath = public_path('img/event/gallery').'/'.$id;
            $request->file->move($destinationPath, $request->file->hashName());
        }
        
        return $this->gallery($id);
    }
    
    public function deletePhoto($id, $photo) {
        unlink(public_path('img\event\gallery').'\\'.$id.'\\'.$photo);
        return redirect()->back();
    }
}
