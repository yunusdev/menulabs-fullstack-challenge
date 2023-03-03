<?php


namespace App\Services;
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
            'location' => $response['name'],
            'temperature' => $response['main']['temp'] - 273.15,
            'pressure' => $response['main']['pressure'],
            'country' => $response['sys']['country'],
            'timestamp' => $response['dt'],
            'weather' => $response['weather'][0],
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
