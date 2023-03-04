<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WeatherResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'city' => $this->city,
            'temperature' => round($this->temperature),
            'pressure' => round($this->pressure),
            'icon' => $this->icon,
            'main' => $this->main,
            'description' => $this->description,
        ];
    }
}
