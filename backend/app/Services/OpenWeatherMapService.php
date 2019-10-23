<?php
namespace App\Services;

class OpenWeatherMapService
{
    private $apiKey;
    private $apiEndpoint;
    private $apiMethods = ['weather' => 'weather'];
    private $units = 'metric';

    /**
     * Setting up api key and api endpoint for Open Weather Map Service
     *
     * OpenWeatherMapService constructor.
     * @param string $apiKey
     * @param string $apiEndpoint
     */
    public function __construct(string $apiKey, string $apiEndpoint)
    {
        $this->apiEndpoint = $apiEndpoint;
        $this->apiKey = $apiKey;
    }

    /**
     * Download data from Open Weather Map Service
     *
     * @param $city
     * @return mixed
     */
    public function getData($city)
    {
        $out =  $this->executeApiRequest(
            $this->apiEndpoint
            . $this->apiMethods['weather']
            . '?q=' . $city . "&units=$this->units"
            . "&appid=$this->apiKey"
        );
        return json_decode($out);
    }

    private function executeApiRequest(string $url) 
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }
}