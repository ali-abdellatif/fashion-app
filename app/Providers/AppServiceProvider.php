<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use App\Models\SiteSetting;
use App\Models\Category;
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
    public function boot(): void
    {
        View::composer(['*'],function ($view){
            $view->with('settings', SiteSetting::instance());
            $view->with('categories', Category::where('is_active', true)->orderBy('sort_order')->get());
        });
    }
}
