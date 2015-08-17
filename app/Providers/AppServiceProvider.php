<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('maxint', function($attribute, $value, $parameters) {
            return strlen($value) <= $parameters[0];
        });

        Validator::replacer('maxint', function($message, $attribute, $rule, $parameters) {
           return str_replace(':maxint', $parameters[0], $message);
        });
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
