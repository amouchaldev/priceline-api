<?php

namespace App\Providers;

use App\Models\Hotel;
use App\Models\Type;
use App\Observers\HotelObserver;
use App\Observers\TypeObserver;
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
        Hotel::observe(HotelObserver::class);
        Type::observe(TypeObserver::class);
    }
}
