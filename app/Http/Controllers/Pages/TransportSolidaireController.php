<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\TransportSolidaire;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TransportSolidaireRequest;

class TransportSolidaireController extends Controller
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
    
    public function home() {
        return redirect('transport/search/0');
    }
    
    public function search($numDay) {
        $transports = TransportSolidaire::where('jour', $numDay)->get();
        
        $liste = array();
        foreach ($transports as $transport) {
            array_push($liste, $transport->transportToArray());
        }
        
        return view('pages.transportSolidaire.search')
            ->withJours(TransportSolidaire::JOURS)
            ->withJour(strtolower(TransportSolidaire::JOURS[$numDay]))
            ->withTransports($liste);
    }
    
    public function manage()
    {
        $transports = TransportSolidaire::where('user_id', Auth::user()->id)->get();
        
        $liste = array();
        foreach ($transports as $transport) {
            array_push($liste, $transport->transportToArray());
        }
        
        return view('pages.transportSolidaire.manage')
            ->withTransport(null)
            ->withJours(TransportSolidaire::JOURS)
            ->withTransports($liste);
    }
    
    public function createTransport(TransportSolidaireRequest $request) {
        $transport = new TransportSolidaire();
        $this->validateTransport($request, $transport);
        
        // Message de validation
        $message = array(
            'type' => 'success',
            'icon' => 'check',
            'content' => 'Votre transport solidaire a été publié avec succés.'
        );
        
        return redirect('transport/manage')->with('message', $message);
    }
    
    protected function validateTransport(TransportSolidaireRequest $request,
        TransportSolidaire $transport) {
        $transport->jour = $request->jour;
        
        if (isset($request->heureDepart)) {
            $transport->heureDepart = new \DateTime();
            $heureDepart = explode(':', $request->heureDepart);
            $transport->heureDepart->setTime($heureDepart[0], $heureDepart[1], 0, 0);
        }
        
        if (isset($request->heureRetour)) {
            $transport->heureRetour = new \DateTime();
            $heureRetour = explode(':', $request->heureRetour);
            $transport->heureRetour->setTime($heureRetour[0], $heureRetour[1], 0, 0);
        }
        
        $transport->commentaire = $request->commentaire;
        
        if (empty($transport->user_id)) {
            // Création
            $transport->user_id = Auth::user()->id;
        }
        $transport->save();
    }
    
    public function deleteTransport($id) {
        TransportSolidaire::destroy($id);
        
        // Message de validation
        $message = array(
            'type' => 'warning',
            'icon' => 'trash',
            'content' => 'Votre transport solidaire a été supprimé avec succés.'
        );
        
        return redirect('transport/manage')->with('message', $message);
    }
}
