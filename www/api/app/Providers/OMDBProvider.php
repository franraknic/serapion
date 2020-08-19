<?php

namespace App\Providers;
  
use Illuminate\Support\ServiceProvider;
use App\OMDB;
  
class OMDBProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
  
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\OMDB', function ($app) {
            return new OMDB();
          });
    }
}