<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }
    
    public function username()
    {
        return 'email';
    }
    
    public function login(Request $request) {
            
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
        
            if (Auth::check() && Auth::user()->actif == 0) {
                // User inactif
                Auth::logout();
                return redirect('login')
                    ->withInput($request->only('email', 'remember'))
                    ->withErrors(['login' => $this->getFailedLoginMessage()
                ]);
            }
            
            // Retour à l'accueil
            return redirect('/');
        }
        
        // Echec d'authentification
        return redirect('login')
            ->withInput($request->only('email', 'remember'))
            ->withErrors(['login' => $this->getFailedLoginMessage()
        ]);
    }
        
    protected function getFailedLoginMessage()
    {
        return 'Les informations fournis n\'ont pas permis de vous authentifier.';
    }
}
