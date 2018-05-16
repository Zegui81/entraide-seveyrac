<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Covoit;
use App\Http\Requests\CovoitRequest;
use Illuminate\Support\Facades\Auth;

class CovoitController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function home()
    {
        $today = date('Y-m-d');
        return redirect('covoit/search/'.$today);
    } 
    
    public function search($day)
    {
        $covoits = Covoit::where('depart', 'like',
            date('Y-m-d', strtotime($day)).'%')->get();
        
        $listCovoits = array();
        foreach ($covoits as $covoit) {
            array_push($listCovoits, $covoit->covoitToArray());
        }
            
        return view('pages.covoit.search')
            ->withCovoits($listCovoits)
            ->withDateSearch(date('d/m/Y', strtotime($day)));
    } 
    
    public function manage()
    {
        $covoits = Covoit::where('user_id', Auth::user()->id)
            ->orderBy('depart', 'desc')->get();
        
        $liste = array();
        foreach ($covoits as $covoit) {
            array_push($liste, $covoit->covoitToArray());
        }
        return view('pages.covoit.manage')
            ->with('HEAD_clockpicker', true)
            ->withCovoit(null)
            ->withCovoits($liste);
    }
    
    public function validateCreateCovoit(CovoitRequest $request) {
        $covoit = new Covoit();
        $this->validateCovoit($request, $covoit);
        
        if (Auth::user()->actif == 2) {
            // Administrateur
            return redirect('admin/covoit');
        }
        
        // Message de validation
        $message = array(
            'type' => 'success',
            'icon' => 'car',
            'content' => 'Votre covoiturage a bien été publié.'
        );
        
        return redirect('covoit/manage')->with('message', $message);
    }
    
    public function editCovoit($id) {
        $covoit = Covoit::where('id', $id)->first();
        
        return view('pages.covoit.covoit')
            ->with('HEAD_clockpicker', true)
            ->withCovoit($covoit->covoitToArray());
    }
    
    public function validateEditCovoit(CovoitRequest $request, $id)
    {
        $covoit = Covoit::where('id', $id)->first();
        $this->validateCovoit($request, $covoit);
        
        // Message de validation
        $message = array(
            'type' => 'success',
            'icon' => 'check',
            'content' => 'Votre covoiturage a bien été modifié.'
        );
        return redirect('covoit/manage')->with('message', $message);
    }
    
    protected function validateCovoit(CovoitRequest $request, Covoit $covoit) {
        $covoit->origine = $request->origine;
        $covoit->destination = $request->destination;
        $covoit->commentaire = $request->commentaire;
        $covoit->nbPlace = $request->nbPlace;
        
        $date = date_create_from_format('j/m/Y', $request->jourDepart);
        $dateDepart = new \DateTime(date_format($date, 'Y-m-d'));
        
        $heureDepart = explode(':', $request->heureDepart);
        $dateDepart->setTime($heureDepart[0], $heureDepart[1], 0, 0);
        $covoit->depart = $dateDepart;
                
        if (Auth::user()->actif == 2) {
            $covoit->user_id = $request->organisateur;
        } else {
            $covoit->user_id = Auth::user()->id;
        }  
        
        $covoit->save();
    }
    
    public function calendar() {
        $covoits = Covoit::all();
        
        $liste = array();
        foreach ($covoits as $covoit) {
            array_push($liste, $covoit->covoitToArrayForCalendar());
        }
        return view('pages.covoit.calendar')
        ->with('HEAD_calendar', true) // Imports dans le header
        ->with('covoits', $liste);
    }
    
    public function deleteCovoit($id) {
        Covoit::destroy($id);
        
        // Message de validation
        $message = array(
            'type' => 'warning',
            'icon' => 'trash',
            'content' => 'Votre covoiturage a bien été supprimé.'
        );
        
        return redirect('covoit/manage')->with('message', $message);
    }
}
