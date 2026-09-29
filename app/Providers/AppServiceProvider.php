<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\City;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('layouts.website', function ($view) {

            $cities = City::where('status', true)
                ->orderBy('sort_order')
                ->orderBy('name')
                ->get();

            $view->with('cities', $cities);
        });
    }
}