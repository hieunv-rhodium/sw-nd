<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
//use Illuminate\Support\ServiceProvider;
use DB;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
//       View composer
        view()->composer('backend.layouts.bottom', function($view){

        $view->with('copyright', \App\Utilities\Copyright::displayNotice());

        });

        //Xem log query
        DB::enableQueryLog();
        DB::listen(function ($query) {

            /* $query->sql
             $query->bindings
             $query->time*/
        });


        //share everywhere
/*        $value = \App\Utilities\Copyright::displayNotice();

        view()->share('copyright', $value);*/

        // Passport
        $this->registerPolicies();
        Passport::routes();

        Passport::tokensExpireIn(Carbon::now()->addDay(15));
        Passport::refreshTokensExpireIn(Carbon::now()->addDays(30));

        Passport::pruneRevokedTokens();

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }

    }

}
