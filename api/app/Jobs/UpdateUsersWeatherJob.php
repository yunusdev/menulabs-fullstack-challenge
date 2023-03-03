<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\Weather;
use App\Services\OpenWeatherApiService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateUsersWeatherJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $users = User::all();

        foreach ($users as $user)
        {
            $weatherApi = new OpenWeatherApiService(
                config('services.open_weather.base_url'),
                config('services.open_weather.api_key'),
                $user->latitude,
                $user->longitude,
            );

            $weatherData = $weatherApi->getWeather();
            info(json_encode($weatherData));

            Weather::query()->updateOrCreate(['user_id' => $user->id], $weatherData);
        }

    }
}
