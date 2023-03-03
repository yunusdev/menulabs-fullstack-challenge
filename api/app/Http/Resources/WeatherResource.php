<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WeatherResource extends JsonResource
{
    public function toArray($request): array
    {
        info($this->resource);

        return [
            'location' => $this->resource['name'],
            'temperature' => $this->resource['main']['temp'] - 273.15,
            'pressure' => $this->resource['main']['pressure'],
            'country' => $this->resource['sys']['country'],
            'timestamp' => $this->resource['dt'],
            'icon' => $this->resource['weather'][0],
            'main' => $this->resource['weather'][0]['main'],
            'description' => $this->resource['weather'][0]['description'],
        ];
    }
}
