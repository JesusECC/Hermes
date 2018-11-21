<?php

namespace hermes\Providers;

use Illuminate\Support\ServiceProvider;

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
        $id=auth()->user()->id;
        $uc=new usersController();        
        $rol=$uc->roles($id);
        
        $view->with("usuario",Session::put('usuario', $rol));
        });
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
