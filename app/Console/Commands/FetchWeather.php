<?php

namespace App\Console\Commands;

use App\Models\WeatherLog;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class FetchWeather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fetch-weather';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch weather for 5 cities and save to DB';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $cities = ['London', 'Paris', 'New York', 'Tokyo', 'Mumbai'];

        $currentIndex = Cache::get('next_city_index', 0);

        $city = $cities[$currentIndex];

        $this->info("🤖 Smart Robot waking up... Target: $city (Index: $currentIndex)");

        WeatherLog::create([
            'city_name' => $city,
            'temperature' => rand(10, 35),
            'condition' => 'Sunny'
        ]);

        $this->info("Saved $city.");

        $nextIndex = $currentIndex + 1;

        if ($nextIndex >= count($cities)) {
            $nextIndex = 0;
            $this->info("Reached end of list. Resetting to start.");
        }

        Cache::put('next_city_index', $nextIndex);
    
    }

}
