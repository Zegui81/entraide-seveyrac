<?php

namespace App\Http\Controllers;

use App\Carousel;

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
        
        return view('home')
            ->withCarousel($liste);
    }
}
