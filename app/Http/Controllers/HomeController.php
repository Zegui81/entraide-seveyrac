<?php

namespace App\Http\Controllers;

use App\Carousel;
use App\Text;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

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
        
        return view('home')
            ->withCarousel($liste)
            ->withTextGauche($texteGauche->content)
            ->withTextBas($texteBas->content);
    }
}
