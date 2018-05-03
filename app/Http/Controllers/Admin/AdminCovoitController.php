<?php

namespace App\Http\Controllers\Admin;

use App\Covoit;
use App\Http\Controllers\Pages\CovoitController;
use App\Http\Requests\CovoitRequest;

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
        $events = Covoit::orderBy('depart', 'desc')->get();
        
        $liste = array();
        foreach ($events as $covoit) {
            array_push($liste, $covoit->covoitToArray());
        }
        return view('admin.content.covoit.covoits')
            ->withListCovoit($liste);
    }
    
    public function editCovoit($id) {
        $covoit = Covoit::where('id', $id)->first();
        return view('pages.covoit.publish')->withCovoit($covoit->covoitToArrayForAdmin());
    }
    
    public function validateEditCovoit(CovoitRequest $request, $id) {
        $covoit = Covoit::where('id', $id)->first();
        $this->validateCovoit($request, $covoit);
        
        // Message de validation
        $message = array(
            'type' => 'success',
            'icon' => 'check',
            'content' => 'Le covoiturage a été modifié avec succés.'
        );
        
        return redirect('admin/covoit')->with('message', $message);
    }
    
    public function deleteCovoit($id)
    {
        Covoit::destroy($id);
        return redirect('admin/covoit');
    }
}
