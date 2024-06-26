<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
         // view()->share('categories', Category::all(['name', 'slug']));

         view()->composer('layouts/site', 'App\Http\Views\Composer\CategoriesViewComposer@compose');
    }
}
