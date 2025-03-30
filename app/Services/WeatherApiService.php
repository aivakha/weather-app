<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WeatherApiService
{
    protected string $baseUrl = 'https://api.open-meteo.com/v1';
    protected string $geoUrl = 'https://geocoding-api.open-meteo.com/v1';

    public function getCoordinates(string $city): ?array
    {
        $response = $this->get($this->geoUrl . '/search', [
            'name' => $city,
            'count' => 1,
        ]);

        return $response['results'][0] ?? null;
    }

    public function getCurrentWeather(float $lat, float $lon): ?array
    {
        $response = $this->get($this->baseUrl . '/forecast', [
            'latitude' => $lat,
            'longitude' => $lon,
            'current_weather' => true,
            'hourly' => ['is_day'],
            'temperature_unit' => 'fahrenheit',
            'wind_speed_unit' => 'mph',
            'precipitation_unit' => 'inch'
        ]);

        return $response['current_weather'] ?? null;
    }

    public function getDailyForecast(float $lat, float $lon): ?array
    {
        $response = $this->get($this->baseUrl . '/forecast', [
            'latitude' => $lat,
            'longitude' => $lon,
            'daily' => ['temperature_2m_max', 'temperature_2m_min', 'weathercode'],
            'timezone' => 'auto',
            'forecast_days' => 8,
            'temperature_unit' => 'fahrenheit',
            'wind_speed_unit' => 'mph',
            'precipitation_unit' => 'inch'
        ]);


        $daily = $response['daily'] ?? null;

        if (!$daily || empty($daily['time'])) {
            return null;
        }

        $today = now($response['timezone'] ?? 'UTC')->toDateString();
        if ($daily['time'][0] === $today) {
            foreach ($daily as $key => &$values) {
                array_shift($values);
            }
        }

        return $daily;
    }

    private function get(string $url, array $params): array
    {
        try {
            $response = Http::timeout(10)->get($url, $params)->throw();
            return $response->json() ?? [];
        } catch (\Throwable $e) {
            Log::error("Weather API request failed: {$e->getMessage()}");
            return [];
        }
    }
}
