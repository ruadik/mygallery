<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
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
        Validator::extend('current_password', function ($attribute, $value, $parameters, $validator) {
            return Hash::check($value, Auth::user()->password);
        });

        View::composer(
            'layouts.__FrontHeader', 'App\Http\View\Composers\FrontHeaderComposer'
        );

        View::composer(
            'layouts.__FrontFooter', 'App\Http\View\Composers\FrontFooterComposer'
        );

        View::composer(
            'layouts.__AdminSidebar', 'App\Http\View\Composers\AdminSidebarComposer'
        );

        Paginator::defaultView('/vendor/pagination/default');

        Paginator::defaultSimpleView('/vendor/pagination/simple-default');

    }
}
