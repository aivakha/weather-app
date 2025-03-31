@props(['forecast'])

<div class="">
    <h3 class="mb-4 text-lg font-semibold">📅 7-Day Forecast</h3>

    <div x-data="{ scrollLeft() { $refs.carousel.scrollLeft -= 200 }, scrollRight() { $refs.carousel.scrollLeft += 200 } }" class="relative max-w-3xl">
        <button @click="scrollLeft" class="absolute left-0 top-1/2 -translate-y-1/2 bg-white shadow p-2 rounded z-10 cursor-pointer transition duration-300 hover:text-blue-600">
            <div class="transform rotate-180">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M7.5 1.5L16.9394 10.9393C17.5251 11.5251 17.5251 12.4749 16.9394 13.0607L7.5 22.5" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
        </button>

        <div class="flex overflow-x-auto space-x-4 px-8 py-2" x-ref="carousel">
            @foreach ($forecast['time'] as $i => $day)
                <div class="min-w-[120px] bg-white rounded-lg shadow p-3">
                    <p class="mb-1 text-sm font-medium text-center">{{ \Carbon\Carbon::parse($day)->format('D, M j') }}</p>

                    <img src="{{ $forecast['icons'][$i] }}" alt="">

                    <div class="mt-1 grid grid-cols-2 grid-rows-2 gap-x-4 gap-y-3 items-center">
                        <div class="row-span-2">
                            <img src="{{ asset('icons/weather/thermometer.svg') }}" alt="temperature" class="w-full h-16 object-cover">
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">min:</p>
                            <p class="text-sm">
                                {{ $forecast['temperature_2m_min'][$i] }}°
                            </p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">max:</p>
                            <p class="text-sm">
                                {{ $forecast['temperature_2m_max'][$i] }}°
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <button @click="scrollRight" class="absolute right-0 top-1/2 -translate-y-1/2 bg-white shadow p-2 rounded z-10 cursor-pointer transition duration-300 hover:text-blue-600 hover:shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M7.5 1.5L16.9394 10.9393C17.5251 11.5251 17.5251 12.4749 16.9394 13.0607L7.5 22.5" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
    </div>
</div>
