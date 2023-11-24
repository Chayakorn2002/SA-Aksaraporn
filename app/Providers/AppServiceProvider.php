<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Validator::extend('max_int', function ($attribute, $value, $parameters, $validator) {
            // Check if the value is less than or equal to PHP_INT_MAX
            return $value <= PHP_INT_MAX;
        });

        // Optionally, you can add a custom error message
        Validator::replacer('max_int', function ($message, $attribute, $rule, $parameters) {
            return str_replace(':max', PHP_INT_MAX, $message);
        });
    }
}
