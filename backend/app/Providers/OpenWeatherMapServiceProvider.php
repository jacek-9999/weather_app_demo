<?php

namespace App\Providers;

use App\Services\OpenWeatherMapService;
use Illuminate\Support\ServiceProvider;

class OpenWeatherMapServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            OpenWeatherMapService::class, function ($app) {
                return new OpenWeatherMapService(
                    env('WEATHER_API_KEY'),
                    env('WEATHER_API_ENDPOINT')
                );
            }
        );
    }
}
