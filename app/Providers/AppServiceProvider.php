<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $setting = \App\Models\Setting::first();
        Paginator::useBootstrap();
        View::share('recent_post', \App\Models\Post::orderBy('id','desc')->limit($setting->recent_limit)->get());
        View::share('popular_post', \App\Models\Post::orderBy('views','desc')->limit($setting->popular_limit)->get());
    }
}
