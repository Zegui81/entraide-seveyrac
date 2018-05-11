<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserEditRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ResetPasswordRequest;

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
        return view('admin.user.memberships')->withListMembership($liste);
    }
    
    /**
     * Confirme la demande d'adhésion
     */
    public function confirmMembership($id) 
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
    
    public function formMembership() 
    {
        return view('admin.user.formMembership');
    }
    
    public function editFormMembership(Request $request)
    {
        $message = null;
        
        if ($request->photo != null) {
            $destinationPath = public_path('img');
            $request->photo->move($destinationPath, 'form.jpg');
            
            // Message de validation
            $message = array(
                'type' => 'success',
                'icon' => 'check',
                'content' => 'Le formulaire d\'adhésion a été modifié.'
            );
        }
        
        return redirect('admin')->with('message', $message);
    }
    
    /**
     * Rejette la demande d'adhésion
     */
    public function rejectMembership($id)
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
        $users = User::where('actif', '>=', 1)->get();
        
        $liste = array();
        foreach ($users as $user) {
            array_push($liste, $user->userToArray());
        }
        return view('admin.user.users')->withListUser($liste);
    }
    
    public function changeCotisation($id)
    {
        $user = User::where('id', $id)->first();
        $user->cotisation = !$user->cotisation;
        $user->save();
        
        $message = array(
            'type' => 'success',
            'icon' => 'check',
            'content' => 'La cotisation d\'un utilisateur a été modifié.'
        );
        return redirect('admin/user')->with('message', $message);
    }
    
    public function editUser($id) 
    {
        $user = User::where('id', $id)->first();
        return view('pages.user.user')->withUser($user->userEditToArray());
    }
    
    public function validateEditUser(UserEditRequest $request, $id)
    {
        $user = User::where('id', $id)->first();
        $this->validateUser($request, $user);
        
        // Message de validation
        $message = array(
            'type' => 'success',
            'icon' => 'check',
            'content' => 'L\'utilisateur a été modifié.'
        );
        return redirect('admin/user')->with('message', $message);
    }
    
    protected function validateUser(UserEditRequest $request, User $user) 
    {
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->adresse = $request->adresse;
        $user->telFixe = $request->telFixe;
        $user->telPortable = $request->telPortable;
        $user->save();
    }
    
    /**
     * Suppression d'un utilisateurs
     */
    public function deleteUser($id) 
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
        return view('admin.user.user');
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
    
    public function upgrade($id)
    {
        $nbAdmin = User::where('actif', 2)->count();
        $message = null;
        
        if ($nbAdmin >= 3) {
            $message = array(
                'type' => 'danger',
                'icon' => 'ban',
                'content' => 'Opération impossible. Vous possédez déjà 3 administrateurs.'
            );
        } else {        
            $user = User::where('id', $id)->first();
            $user->actif = 2;
            $user->save();
            
            $message = array(
                'type' => 'success',
                'icon' => 'check',
                'content' => 'L\'adhérent a été promu en administrateur.'
            );
        }
        return redirect('admin/user')->with('message', $message);
    }
    
    public function downgrade($id)
    {
        $user = User::where('id', $id)->first();
        $user->actif = 1;
        $user->save();
        
        $message = array(
            'type' => 'success',
            'icon' => 'check',
            'content' => 'L\'adhérent n\'est plus administrateur.'
        );
        return redirect('admin/user')->with('message', $message);
    }
    
    public function resetPassword($id)
    {
        return view('auth.password');
    }
    
    public function confirmResetPassword(ResetPasswordRequest $request, $id)
    {
        $user = User::where('id', $id)->first();
        $user->password = Hash::make($request->password);
        $user->save();
        
        // Message de validation
        $message = array(
            'type' => 'success',
            'icon' => 'check',
            'content' => 'Le mot de passe de l\'utilisateur a bien été changé.'
        );
        
        return redirect('/admin/user/'.$id)->with('message', $message);
    }
}
