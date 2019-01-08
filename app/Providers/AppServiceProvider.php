<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider {
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        Validator::extend('http', function ($attribute, $value, $parameters, $validator) {
            if ( explode('://', $value)[0] == 'http' || explode('://', $value)[0] == 'https') {
                return true;
            }
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }
}
