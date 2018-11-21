<?php

namespace hermes\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use auth;
use hermes\Http\Controllers\usersController;
class UserServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer("*",function($view){
            // dd(empty(auth()->user()));
            if(!empty(auth()->user())){
                $id=auth()->user()->id;
                $uc=new usersController();        
                $rol=$uc->roles($id);
                // Session::put('usuario', $rol);
                $view->with("usuario",$rol);
            }
        
        });
        // view::share('usuario','hola');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
