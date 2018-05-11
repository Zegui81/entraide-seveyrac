<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\User;
use App\Http\Requests\EventRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\EventController;

class AdminEventController extends EventController
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
        $events = Event::where('actif', true)
            ->orderBy('debut', 'desc')->get();
        
        $liste = array();
        foreach ($events as $event) {
            array_push($liste, $event->eventToArray());
        }
        return view('admin.content.event.events')
            ->withListEvent($liste);
    }
    
    public function proposeEvents()
    {
        // Liste des évènements
        $events = Event::where('actif', false)
            ->orderBy('debut', 'desc')->get();
        
        $liste = array();
        foreach ($events as $event) {
            array_push($liste, $event->eventToArray());
        }
        return view('admin.content.event.propose')
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
        $event->actif = true;
        $this->validateEvent($request, $event);
        
        // Message de validation
        $message = array(
            'type' => 'success',
            'icon' => 'calendar-check-o',
            'content' => 'L\'évènement a été créé.'
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
            'content' => 'L\'évènement a bien été édité.'
        );
        return redirect('admin/event')->with('message', $message);
    }
    
    public function validateEditProposeEvent(EventRequest $request, $id)
    {
        $event = Event::where('id', $id)->first();
        $this->validateEvent($request, $event);
        
        // Message de validation
        $message = array(
            'type' => 'success',
            'icon' => 'calendar-check-o',
            'content' => 'La proposition d\'évènement a bien été éditée.'
        );
        return redirect('admin/propose/event')->with('message', $message);
    }
    
    public function publishEvent($id)
    {
        $event = Event::where('id', $id)->first();
        $event->actif = true;
        $event->save();
        
        // Message de validation
        $message = array(
            'type' => 'success',
            'icon' => 'calendar-check-o',
            'content' => 'La proposition d\'évènement a bien été publiée.'
        );
        return redirect('admin/propose/event')->with('message', $message);
    }
    
    public function refuseEvent($id)
    {
        Event::destroy($id);
        if (file_exists(public_path('img\event').'\\'.$id.'.jpg')) {
            unlink(public_path('img\event').'\\'.$id.'.jpg'); // Photos principales
        }
                
        // Message de validation
        $message = array(
            'type' => 'warning',
            'icon' => 'calendar-times-o',
            'content' => 'L\'évènement proposé a bien été refusé.'
        );
        return redirect('admin/propose/event')->with('message', $message);
    }
    
    public function deleteEvent($id)
    {
        Event::destroy($id);
        if (file_exists(public_path('img\event').'\\'.$id.'.jpg')) {
            unlink(public_path('img\event').'\\'.$id.'.jpg'); // Photos principales
        }
        
        $files = glob(public_path('img\event\gallery').'\\'.$id.'\\*'); // Tous les fichiers
        foreach ($files as $file) { // iterate files
            if(is_file($file))
                unlink($file); // delete file
        }
        
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
        if (file_exists(public_path('img\event\gallery').'\\'.$id.'\\'.$photo)) {
            unlink(public_path('img\event\gallery').'\\'.$id.'\\'.$photo);
        }
        return redirect()->back();
    }
}
