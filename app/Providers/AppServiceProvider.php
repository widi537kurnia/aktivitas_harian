<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        View::composer('layout.main_user', function ($view) {
            if (Auth::check()) {
                $user = Auth::user();

                if (empty($user->image)) {
                    $user->image = '../photo-user/merah.jpg';
                }

                $view->with('photo', asset('storage/photo-user/'.Auth::user()->image))
                     ->with('name', Auth::user()->name . '!');

            }
        });

        View::composer('auth.profile', function($view) {
            if (Auth::check()) {
                $user = Auth::user();

                if (empty($user->image)) {
                    $user->image = '../photo-user/merah.jpg';
                }

                $view->with('photo', asset('storage/photo-user/'.Auth::user()->image));
            }
        });
    }


}

