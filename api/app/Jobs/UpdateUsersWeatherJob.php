<?php

namespace App\Jobs;

use App\Models\User;
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
        //




    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $users = User::all();

        $lat = 6.4541;
        $lng = 3.3947;

        $weatherApi = new OpenWeatherApiService(
            config('services.open_weather.base_url'),
            config('services.open_weather.api_key'),
            $lat,
            $lng,
        );

        info("Here >>>>> ");
        info($weatherApi->getWeather());

    }
}
