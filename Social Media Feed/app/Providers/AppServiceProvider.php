<?php

namespace App\Providers;

use App\Models\Theme;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //force https if our application is running in production environment
        if(config('app.env') == 'production'){
            //force everything to be served and linked using https
            URL::forceScheme('https');
        }

        View::composer('layouts.app', function($view){
        
            $view->with('themes', Theme::all());
        });


    }
}
