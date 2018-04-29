<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;

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
        return view('admin.home')
            ->withNbDemandeAdhesion($nbDemandeAdhesion)
            ->withNbUser($nbUser);
    }
}
