<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
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
     * Tableau des demandes d'admission
     */
    public function membership() 
    {
        // Utilisateurs inactif
        $users = User::where('actif', 0)->get();
        
        $liste = array();
        foreach ($users as $user) {
            array_push($liste, $user->userToArray());
        }
        return view('admin.users.membership')->withListMembership($liste);
    }
    
    /**
     * Confirme la demande d'adhésion
     */
    public function confirm($id) 
    {
        $user = User::where('id', $id)->first();
        $user->actif = 1;
        $user->save();
        
        // Message de confirmation
        $message = array(
            'type' => 'success',
            'icon' => 'check',
            'content' => 'La demande d\'admission a été acceptée.'
        );
        
        return redirect('admin/membership')->with('message', $message);
    }
    
    /**
     * Rejette la demande d'adhésion
     */
    public function reject($id)
    {
        User::destroy($id);
        
        // Message de validation
        $message = array(
            'type' => 'warning',
            'icon' => 'times',
            'content' => 'La demande d\'admission a été rejetée.'
        );
        return redirect('admin/membership')->with('message', $message);
    }
    
    /**
     * Tableau des utilisateurs
     */
    public function user()
    {
        // Utilisateurs actif
        $users = User::where('actif', 1)
            ->where('id', '!=', Auth::user()->id)->get();
        
        $liste = array();
        foreach ($users as $user) {
            array_push($liste, $user->userToArray());
        }
        return view('admin.users.user')->withListUser($liste);
    }
    
    /**
     * Suppression d'un utilisateurs
     */
    public function delete($id) 
    {
        User::destroy($id);
        
        // Message de validation
        $message = array(
            'type' => 'warning',
            'icon' => 'trash',
            'content' => 'L\'utilisateur a été supprimé avec succés.'
        );
        
        return redirect('admin/user')->with('message', $message);
    }
    
    /**
     * Formulaire d'ajout d'un adhérent
     */
    public function register() 
    {
        return view('admin.users.register');
    }
    
    /**
     * Ajout d'un utilisateur
     */
    public function addUser(UserRequest $request)
    {
        $this->validator($request->all())->validate();
        $user = $this->create($request->all());
        $user->actif = 1;
        $user->save();
        
        $message = array(
            'type' => 'success',
            'icon' => 'check',
            'content' => 'L\'adhérent a été ajouté avec succés.'
        );
        return redirect('admin/user')->with('message', $message);
    }
    
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'telFixe' => $data['telFixe'],
            'telPortable' => $data['telPortable']
        ]);
    }
    
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data,
            UserRequest::getRules(),
            UserRequest::getMessages());
    }
}
