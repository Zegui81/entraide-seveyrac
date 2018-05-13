<?php

namespace App\Http\Controllers;

use App\Carousel;
use App\Text;
use App\Http\Requests\ContactRequest;
use App\Contact;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Carousel::all();
        $liste = array();
        foreach ($photos as $photo) {
            array_push($liste, $photo->carouselToArray());
        }
        
        $texteGauche = Text::where('code', 'HOME_TEXT_GAUCHE')->first();
        $texteBas = Text::where('code', 'HOME_TEXT_BAS')->first();
        $footer = Text::where('code', 'FOOTER')->first();
        
        return view('home')
            ->withCarousel($liste)
            ->withTextGauche($texteGauche->content)
            ->withTextBas($texteBas->content);
    }
    
    public function inexist()
    {
        $photos = Carousel::all();
        $liste = array();
        foreach ($photos as $photo) {
            array_push($liste, $photo->carouselToArray());
        }

        $message = array(
            'type' => 'danger',
            'icon' => 'meh-o',
            'content' => 'La page à laquelle vous essayez d\'accéder n\'existe pas.'
        );
        return view('404')
            ->withCarousel($liste)
            ->withMessage($message);
    }
    
    public function contact() 
    {
        return view('contact');
    }
    
    public function createContact(ContactRequest $request)
    {
        $contact = new Contact();
        $this->validateContact($request, $contact);
        
        $message = array(
            'type' => 'success',
            'icon' => 'check',
            'content' => 'Votre message a bien été envoyé aux administrateurs du site.'
        );
        return redirect('/')->with('message', $message);
    }
    
    protected function validateContact(ContactRequest $request, Contact $contact)
    {
        $contact->email = $request->email;
        $contact->nom = $request->nom;
        $contact->prenom = $request->prenom;
        $contact->message = $request->message;
        $contact->save();
    }
}
