<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Carousel;

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
        return view('admin.home')
            ->withNbImagesCarousel($nbImagesCarousel)
            ->withNbDemandeAdhesion($nbDemandeAdhesion)
            ->withNbUser($nbUser);
    }
}
