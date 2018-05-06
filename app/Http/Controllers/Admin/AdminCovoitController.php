<?php

namespace App\Http\Controllers\Admin;

use App\Covoit;
use App\Http\Controllers\Pages\CovoitController;
use App\Http\Requests\CovoitRequest;
use App\User;

class AdminCovoitController extends CovoitController
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
    
    public function covoits()
    {
        // Liste des évènements
        $covoits = Covoit::orderBy('depart', 'desc')->get();
        
        $liste = array();
        foreach ($covoits as $covoit) {
            array_push($liste, $covoit->covoitToArray());
        }
        return view('admin.content.covoit.covoits')
            ->withListCovoit($liste);
    }
    
    public function createCovoit()
    {
        $users = User::orderBy('nom')->get();
        $liste = array();
        foreach ($users as $user) {
            $liste[$user->id] = $user->prenom.' '.$user->nom;
        }
        
        return view('pages.covoit.covoit')
            ->withUsers($liste)
            ->withCovoit(null);
    }
        
    public function editCovoit($id)
    {
        $covoit = Covoit::where('id', $id)->first();
        
        $users = User::orderBy('nom')->get();
        $liste = array();
        foreach ($users as $user) {
            $liste[$user->id] = $user->prenom.' '.$user->nom;
        }
        
        return view('pages.covoit.covoit')
            ->withUsers($liste)
            ->withCovoit($covoit->covoitToArray());
    }
    
    public function validateCreateCovoit(CovoitRequest $request)
    {
        $covoit = new Covoit();
        $this->validateCovoit($request, $covoit);
        
        // Message de validation
        $message = array(
            'type' => 'success',
            'icon' => 'car',
            'content' => 'Le covoiturage a été publié.'
        );
        return redirect('admin/covoit')->with('message', $message);
    }
    
    public function validateEditCovoit(CovoitRequest $request, $id)
    {
        $covoit = Covoit::where('id', $id)->first();
        $this->validateCovoit($request, $covoit);
        
        // Message de validation
        $message = array(
            'type' => 'success',
            'icon' => 'check',
            'content' => 'Le covoiturage a été modifié.'
        );
        return redirect('admin/covoit')->with('message', $message);
    }
    
    public function deleteCovoit($id)
    {
        Covoit::destroy($id);
        
        // Message de validation
        $message = array(
            'type' => 'warning',
            'icon' => 'trash',
            'content' => 'Le covoiturage a été supprimé.'
        );
        return redirect('admin/covoit')->with('message', $message);
    }
}
