<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; 
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Paginator::useBootstrap();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        if(env('REDIRECT_HTTPS')){
            URL::forceScheme('https');
            \URL::forceRootUrl(config('app.url'));   
            
            // $this->app['request']->server->set('HTTPS','on');
        }

        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
        date_default_timezone_set('Asia/Jakarta');

        $project_title = '| AdMedika - HCIS';
        View::share('title', $project_title);
    }
}
