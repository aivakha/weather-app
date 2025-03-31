@props(['city', 'weather'])

<div class="max-w-md">
    <h3 class="mb-4 text-lg font-semibold">🏙 {{ ucfirst($city) }}</h3>

    <div class="p-4 mx-auto  rounded-lg bg-gray-100">
        <div class="grid grid-cols-4 gap-4 text-center">
            <div>
                <img src="{{ $weather['icon'] }}" alt="current-weather">
            </div>

            <div>
                <img src="{{ asset('icons/weather/thermometer.svg') }}" alt="temperature">
                <strong class="font-medium">{{ $weather['temperature'] }}</strong>
            </div>

            <div>
                <img src="{{ asset('icons/weather/wind.svg') }}" alt="wind">
                <strong class="font-medium">{{ $weather['windspeed'] }} mph</strong>
            </div>

            <div>
                <img src="{{ asset('icons/weather/barometer.svg') }}" alt="barometer">
                <strong class="font-medium">{{ \Carbon\Carbon::parse($weather['time'])->format('D, M j') }}</strong>
            </div>
        </div>
    </div>
</div>
