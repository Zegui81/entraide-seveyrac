<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function getSignup() {
        return view('signup');
    }
    
    public function postSignup(UserRequest $request) {
        
    }
}
