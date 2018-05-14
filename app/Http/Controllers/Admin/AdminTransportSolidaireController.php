<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Pages\TransportSolidaireController;
use App\TransportSolidaire;
use App\User;
use App\Http\Requests\TransportSolidaireRequest;

class AdminTransportSolidaireController extends TransportSolidaireController
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
    
    public function transports()
    {
        // Liste des évènements
        $transports = TransportSolidaire::orderBy('jour')->get();
        
        $liste = array();
        foreach ($transports as $transport) {
            array_push($liste, $transport->transportToArray());
        }
        return view('admin.content.transportSolidaire.transports')
            ->withListTransport($liste);
    }
    
    public function createTransport()
    {
        $users = User::where('actif', '>=', 1)->orderBy('nom')->get();
        $liste = array();
        foreach ($users as $user) {
            $liste[$user->id] = $user->prenom.' '.$user->nom;
        }
        
        return view('pages.transportSolidaire.transport')
            ->with('HEAD_clockpicker', true)
            ->withUsers($liste)
            ->withTransport(null)
            ->withJours(TransportSolidaire::JOURS);
    }
    
    public function editTransport($id)
    {
        $transport = TransportSolidaire::where('id', $id)->first();
        $users = User::where('actif', '>=', 1)->orderBy('nom')->get();
        $liste = array();
        foreach ($users as $user) {
            $liste[$user->id] = $user->prenom.' '.$user->nom;
        }
        
        return view('pages.transportSolidaire.transport')
            ->with('HEAD_clockpicker', true)
            ->withUsers($liste)
            ->withTransport($transport->transportToArray())
            ->withJours(TransportSolidaire::JOURS);
    }
    
    public function validateCreateTransport(TransportSolidaireRequest $request)
    {
        $transport = new TransportSolidaire();
        $this->validateTransport($request, $transport);
        
        // Message de validation
        $message = array(
            'type' => 'success',
            'icon' => 'check',
            'content' => 'Le transport solidaire a été publié avec succés.'
        );
        return redirect('admin/transport')->with('message', $message);
    }
    
    public function validateEditTransport(TransportSolidaireRequest $request, $id)
    {
        $transport = TransportSolidaire::where('id', $id)->first();
        $this->validateTransport($request, $transport);
        
        // Message de validation
        $message = array(
            'type' => 'success',
            'icon' => 'check',
            'content' => 'Le transport solidaire a été modifié avec succés.'
        );
        return redirect('admin/transport')->with('message', $message);
    }
    
    public function deleteTransport($id) {
        TransportSolidaire::destroy($id);
        
        // Message de validation
        $message = array(
            'type' => 'warning',
            'icon' => 'trash',
            'content' => 'Le transport solidaire a été supprimé.'
        );
        
        return redirect('admin/transport')->with('message', $message);
    }
}
