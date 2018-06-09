<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
    * Bootstrap any application services.
    *
    * @return void
    */
    public function boot()
	{
		\App\Models\User::observe(\App\Observers\UserObserver::class);
<<<<<<< HEAD
		\App\Models\Board::observe(\App\Observers\BoardObserver::class);
=======
		\App\Models\Boad::observe(\App\Observers\BoadObserver::class);
		Schema::defaultStringLength(191);
        //
>>>>>>> e2cc8fe9f7bb3773d510027d179c353f3312eed2
    }

    /**
    * Register any application services.
    *
    * @return void
    */
    public function register()
    {
        if (app()->environment() == 'local' || app()->environment() == 'testing') {

            $this->app->register(\Summerblue\Generator\GeneratorsServiceProvider::class);

        }
    }
}
