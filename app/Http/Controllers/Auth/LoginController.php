<?php

namespace hermes\Http\Controllers\Auth;

use hermes\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    public function login(){
        $this->validate(request(),[
            'email'=>'email|required|string',
            'password'=>'required|string',
        ]);
    }

}
