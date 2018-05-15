<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Http\Requests\ResetPasswordRequest;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserEditRequest;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function profile()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('pages.user.user')->withUser($user->userEditToArray());
    }
    
    public function editProfile(UserEditRequest $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $this->validateUser($request, $user);
        
        // Message de validation
        $message = array(
            'type' => 'success',
            'icon' => 'check',
            'content' => 'Votre profil a bien été modifié.'
        );
        return redirect('profile')->with('message', $message);
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
    
    public function resetPassword() 
    {
        return view('auth.password');
    }
    
    public function confirmResetPassword(ResetPasswordRequest $request)
    {
        $user = User::where('id', Auth::user()->id)->first(); 
        $user->password = Hash::make($request->password);
        $user->save();
        
        // Message de validation
        $message = array(
            'type' => 'success',
            'icon' => 'check',
            'content' => 'Votre mot de passe a bien été modifié.'
        );
        
        return redirect('profile')->with('message', $message);
    }
}
