<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema; // importez cette classe pour agir sur le schéma des tables
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191); // ajouter cette ligne pour l'encodage choisi
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
