<?php


namespace App\Services;
use App\Http\Resources\WeatherResource;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;


class OpenWeatherApiService
{
    public function __construct(
        private string $baseUrl,
        private string $apiKey,
        private float $latitude,
        private float $longitude,
    ) {
    }

    public function getWeather(): array
    {
        $response =  $this
            ->client()
            ->get('weather', [
                'lat' => $this->latitude,
                'lon' => $this->longitude,
                'appid' => $this->apiKey,
            ])
            ->json();

        return [
            'city' => $response['name'] ?? null,
            'temperature' => $response['main']['temp'] - 273.15,
            'pressure' => $response['main']['pressure'],
            'country' => $response['sys']['country'] ?? null,
            'timestamp' => $response['dt'],
            'icon' => $response['weather'][0]['icon'],
            'main' => $response['weather'][0]['main'],
            'description' => $response['weather'][0]['description'],
        ];
    }


    private function client(): PendingRequest
    {
        return Http::baseUrl($this->baseUrl)
            ->asJson()
            ->acceptJson()
            ->timeout(60)
            ->throw();
    }
}
