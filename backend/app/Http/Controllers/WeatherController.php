<?php

namespace App\Http\Controllers;

use App\Services\OpenWeatherMapService;

class WeatherController extends Controller
{
    private $openWeatherService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(OpenWeatherMapService $openWeatherMapService)
    {
        $this->openWeatherService = $openWeatherMapService;
    }

    /**
     * Return weather data for particular city.
     *
     * @return Illuminate\Http\Response json
     */
    public function readData($city = 'new york')
    {
        return response()->json($this->openWeatherService->getData($city));
    }
}
