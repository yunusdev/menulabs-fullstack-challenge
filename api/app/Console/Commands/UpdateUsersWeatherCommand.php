<?php

namespace App\Console\Commands;

use App\Jobs\UpdateUsersWeatherJob;
use Illuminate\Console\Command;

class UpdateUsersWeatherCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:weather';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update users weather';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        UpdateUsersWeatherJob::dispatch();
    }
}
