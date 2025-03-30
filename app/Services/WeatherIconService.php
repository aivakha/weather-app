<?php

namespace App\Services;

class WeatherIconService
{
    protected array $conditions = [
        0 => [
            'name' => 'Clear sky',
            'icons' => [
                'day' => 'clear-day.svg',
                'night' => 'clear-night.svg',
            ],
        ],
        1 => [
            'name' => 'Mainly clear',
            'icons' => [
                'day' => 'partly-cloudy-day.svg',
                'night' => 'partly-cloudy-night.svg',
            ],
        ],
        2 => [
            'name' => 'Partly cloudy',
            'icons' => [
                'day' => 'partly-cloudy-day.svg',
                'night' => 'partly-cloudy-night.svg',
            ],
        ],
        3 => [
            'name' => 'Overcast',
            'icons' => [
                'day' => 'overcast-day.svg',
                'night' => 'overcast-night.svg',
            ],
        ],
        45 => [
            'name' => 'Fog',
            'icons' => [
                'day' => 'fog-day.svg',
                'night' => 'fog-night.svg',
            ],
        ],
        48 => [
            'name' => 'Depositing rime fog',
            'icons' => [
                'day' => 'fog-day.svg',
                'night' => 'fog-night.svg',
            ],
        ],
        51 => [
            'name' => 'Light drizzle',
            'icons' => [
                'day' => 'partly-cloudy-day-drizzle.svg',
                'night' => 'partly-cloudy-night-drizzle.svg',
            ],
        ],
        53 => [
            'name' => 'Moderate drizzle',
            'icons' => [
                'day' => 'partly-cloudy-day-drizzle.svg',
                'night' => 'partly-cloudy-night-drizzle.svg',
            ],
        ],
        55 => [
            'name' => 'Dense drizzle',
            'icons' => [
                'day' => 'drizzle.svg',
                'night' => 'drizzle.svg',
            ],
        ],
        56 => [
            'name' => 'Light freezing drizzle',
            'icons' => [
                'day' => 'partly-cloudy-day-sleet.svg',
                'night' => 'partly-cloudy-night-sleet.svg',
            ],
        ],
        57 => [
            'name' => 'Dense freezing drizzle',
            'icons' => [
                'day' => 'sleet.svg',
                'night' => 'sleet.svg',
            ],
        ],
        61 => [
            'name' => 'Slight rain',
            'icons' => [
                'day' => 'partly-cloudy-day-rain.svg',
                'night' => 'partly-cloudy-night-rain.svg',
            ],
        ],
        63 => [
            'name' => 'Moderate rain',
            'icons' => [
                'day' => 'rain.svg',
                'night' => 'rain.svg',
            ],
        ],
        65 => [
            'name' => 'Heavy rain',
            'icons' => [
                'day' => 'rain.svg',
                'night' => 'rain.svg',
            ],
        ],
        66 => [
            'name' => 'Light freezing rain',
            'icons' => [
                'day' => 'partly-cloudy-day-sleet.svg',
                'night' => 'partly-cloudy-night-sleet.svg',
            ],
        ],
        67 => [
            'name' => 'Heavy freezing rain',
            'icons' => [
                'day' => 'sleet.svg',
                'night' => 'sleet.svg',
            ],
        ],
        71 => [
            'name' => 'Slight snow fall',
            'icons' => [
                'day' => 'partly-cloudy-day-snow.svg',
                'night' => 'partly-cloudy-night-snow.svg',
            ],
        ],
        73 => [
            'name' => 'Moderate snow fall',
            'icons' => [
                'day' => 'snow.svg',
                'night' => 'snow.svg',
            ],
        ],
        75 => [
            'name' => 'Heavy snow fall',
            'icons' => [
                'day' => 'snow.svg',
                'night' => 'snow.svg',
            ],
        ],
        77 => [
            'name' => 'Snow grains',
            'icons' => [
                'day' => 'snowflake.svg',
                'night' => 'snowflake.svg',
            ],
        ],
        80 => [
            'name' => 'Rain showers',
            'icons' => [
                'day' => 'partly-cloudy-day-rain.svg',
                'night' => 'partly-cloudy-night-rain.svg',
            ],
        ],
        81 => [
            'name' => 'Moderate showers',
            'icons' => [
                'day' => 'rain.svg',
                'night' => 'rain.svg',
            ],
        ],
        82 => [
            'name' => 'Violent rain showers',
            'icons' => [
                'day' => 'rain.svg',
                'night' => 'rain.svg',
            ],
        ],
        85 => [
            'name' => 'Slight snow showers',
            'icons' => [
                'day' => 'partly-cloudy-day-snow.svg',
                'night' => 'partly-cloudy-night-snow.svg',
            ],
        ],
        86 => [
            'name' => 'Heavy snow showers',
            'icons' => [
                'day' => 'snow.svg',
                'night' => 'snow.svg',
            ],
        ],
        95 => [
            'name' => 'Thunderstorm',
            'icons' => [
                'day' => 'thunderstorms-day.svg',
                'night' => 'thunderstorms-night.svg',
            ],
        ],
        96 => [
            'name' => 'Thunderstorm with hail',
            'icons' => [
                'day' => 'thunderstorms-day-rain.svg',
                'night' => 'thunderstorms-night-rain.svg',
            ],
        ],
        99 => [
            'name' => 'Severe thunderstorm',
            'icons' => [
                'day' => 'thunderstorms-day-rain.svg',
                'night' => 'thunderstorms-night-rain.svg',
            ],
        ],
    ];

    public function getIcon(int $code, bool $isDay = true): string
    {
        $condition = $this->conditions[$code] ?? null;
        $icon = $condition['icons'][$isDay ? 'day' : 'night'] ?? 'overcast.svg';
        return asset('icons/weather/' . $icon);
    }
}
