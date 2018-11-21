<?php

namespace hermes\Http\Controllers\Auth;

use hermes\Http\Controllers\Controller;
use Illuminate\Http\Request;
use hermes\users;

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
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function login(Request $request){
        $credentials=$this->validate($request,[
            $this->username()=>'required|string',
            'password'=>'required|string',
        ]);
        if(Auth::attempt($credentials)){
            return redirect()->route('principal');
            // return 'tu session ha iniciado correctamente';
        }
        // return 'tu session no ha iniciado correctamente';
        return back()
        ->withErrors([$this->username()=>'estas credenciales no coinciden con nuestros registros'])
        ->withInput(request([$this->username()]));
    }
    public function logout(){        
        Auth::logout();
        return redirect('\login');
    }

    public function username(){
        return 'email';
    }
    // public function logout(Request $request)
    // {
    //     $this->guard()->logout();

    //     $request->session()->invalidate();

    //     return $this->loggedOut($request) ?: redirect('login');
    // }

}
