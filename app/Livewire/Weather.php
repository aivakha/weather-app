<?php

namespace App\Livewire;

use App\Services\WeatherApiService;
use App\Services\WeatherIconService;
use Livewire\Component;
use Illuminate\Contracts\View\View;

class Weather extends Component
{
    public string $city = '';
    public array $weather = [];
    public array $dailyForecast = [];
    public string $error;
    public bool $loading = false;

    protected WeatherApiService $apiService;
    protected WeatherIconService $iconService;


    public function boot(WeatherApiService $apiService, WeatherIconService $iconService): void
    {
        $this->apiService = $apiService;
        $this->iconService = $iconService;
    }

    public function getWeather()
    {
        $this->reset(['weather', 'dailyForecast', 'error']);
        $this->loading = true;

        try {
            $location = $this->apiService->getCoordinates($this->city);

            if (!$location) {
                $this->error = 'Not found.';
                return;
            }

            // Get Weather Data
            $this->weather = $this->apiService->getCurrentWeather($location['latitude'], $location['longitude']);

            if ($this->weather) {
                $this->weather['icon'] = $this->iconService->getIcon(
                    code: (int) $this->weather['weathercode'],
                    isDay: (bool) $this->weather['is_day']
                );
            }

            // Get Daily Forecast Data
            $this->dailyForecast = $this->apiService->getDailyForecast($location['latitude'], $location['longitude']);

            if ($this->dailyForecast) {
                $this->dailyForecast['icons'] = array_map(
                    fn ($code) => $this->iconService->getIcon(
                        code: (int) $code,
                    ),
                    $this->dailyForecast['weathercode']
                );
            }
        } catch (\Exception $e) {
            $this->error = $e->getMessage();
        } finally {
            $this->loading = false;
        }
    }

    public function render(): View
    {
        return view('livewire.weather');
    }
}
