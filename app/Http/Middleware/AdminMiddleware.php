<?php

namespace hermes\Http\Middleware;

use Closure;
use auth;
use hermes\Http\Controllers\usersController;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $id=auth()->User()->id;        
        $uc=new usersController();        
        $rol=$uc->roles($id);
        // dd($rol);
        if(isset($rol[0]->nombreRol)){
            if($rol[0]->nombreRol!='Admin'){
                // dd($rol);
                return redirect('/login');
            }
        }else {
            return redirect('/login');
        }
        return $next($request);
    }
}
