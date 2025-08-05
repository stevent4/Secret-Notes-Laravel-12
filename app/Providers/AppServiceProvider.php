<?php

namespace App\Providers;

use App\Models\PasswordRequest;
use Illuminate\Support\Facades\View;
use App\Providers\EventServiceProvider;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->register(\App\Providers\EventServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $count = auth()->check() && auth()->user()->is_admin
                ? PasswordRequest::count()
                : 0;

            $view->with('passwordRequestCount', $count);
        });
    }
}
