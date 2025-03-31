<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Weather App</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="flex flex-col min-h-screen">

<header class="py-4 shadow-lg shadow-gray-300">
    <div class="container">
        <nav class="flex gap-4">
            <a href="/" class="transition-colors duration-75 hover:text-blue-600">Home</a>
            <a href="https://google.com" class="transition-colors duration-75 hover:text-blue-600">External Link</a>
        </nav>
    </div>
</header>

<main class="flex-1 py-14">
    <div class="container">
        @livewire('weather')
    </div>
</main>

<footer class="py-10 bg-gray-100">
    <div class="container">
        <div class="flex justify-center items-center gap-6">
            <a href="https://instagram.com">
                <img
                    src="{{ asset('icons/social/instagram.svg') }}"
                    alt="instagram"
                    class="w-6 h-6"
                >
            </a>
            <a href="https://twitter.com">
                <img
                    src="{{ asset('icons/social/twitter.svg') }}"
                    alt="twitter"
                    class="w-6 h-6"
                >
            </a>
            <a href="https://linkedin.com">
                <img
                    src="{{ asset('icons/social/linkedin.svg') }}"
                    alt="linkedin"
                    class="w-6 h-6"
                >
            </a>
        </div>

        <div class="mt-4 text-center">
            @ Weather App {{ date('Y') }}
        </div>
    </div>
</footer>
@livewireScripts
</body>
</html>
