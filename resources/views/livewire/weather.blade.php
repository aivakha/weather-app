<div x-data="{ loading: @entangle('loading') }" class="c-weather">
    <div class="">
        <div class="mx-auto max-w-md">
            <h2 class="text-2xl font-bold mb-4 text-center">
                Weather App Component
            </h2>
            <input
                type="text"
                class="border w-full px-4 py-2 rounded-md mb-2"
                placeholder="Enter city..."
                wire:model.defer="city"
                @keydown.enter="loading = true; $wire.getWeather()"
            >
            <button
                class="bg-blue-600 text-white w-full py-2 rounded hover:bg-blue-700 transition align-middle cursor-pointer"
                wire:click="getWeather"
                wire:loading.attr="disabled"
                x-bind:disabled="loading"
            >
                <span wire:loading.remove>Get Weather</span>
                <span wire:loading>
                    Loading...
                    <span class="inline-block align-middle">
                        <x-weather-loader/>
                    </span>
                </span>
            </button>
        </div>

        @if ($error)
            <p class="text-red-500 mt-4 text-center">{{ $error }}</p>
        @endif

        <div class="mt-12 mx-auto xl:max-w-4/5 grid grid-cols-1 lg:grid-cols-5 gap-12 justify-center w-fit">
            @if ($weather)
                <div class="lg:col-span-2">
                    <x-weather-card :city="$city" :weather="$weather" />
                </div>
            @endif

            @if ($dailyForecast)
                <div class="lg:col-span-3">
                    <x-weather-forecast-slider :forecast="$dailyForecast" />
                </div>
            @endif
        </div>
    </div>
</div>
