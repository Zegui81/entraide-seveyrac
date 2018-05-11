<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Carousel;
use App\Event;
use App\Covoit;
use App\TransportSolidaire;
use App\Contact;
use App\Presse;

class AdminController extends Controller
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
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nbDemandeAdhesion = User::where('actif', 0)->count();
        $nbUser = User::where('actif', 1)->count();
        $nbImagesCarousel = Carousel::count();
        $nbPropositionEvent = Event::where('actif', false)->count();
        $nbEvent = Event::where('actif', true)->count();
        $nbCovoit = Covoit::count();
        $nbTransport = TransportSolidaire::count();
        $nbContact = Contact::count();
        $nbArticle = Presse::count();
        
        return view('admin.home')
            ->withNbImagesCarousel($nbImagesCarousel)
            ->withNbDemandeAdhesion($nbDemandeAdhesion)
            ->withNbUser($nbUser)
            ->withNbEvent($nbEvent)
            ->withNbPropositionEvent($nbPropositionEvent)
            ->withNbCovoit($nbCovoit)
            ->withNbTransport($nbTransport)
            ->withNbContact($nbContact)
            ->withNbArticle($nbArticle);
    }
}
