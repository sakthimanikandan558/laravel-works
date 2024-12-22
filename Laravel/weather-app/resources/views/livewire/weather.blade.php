<div class="p-6 max-w-4xl mx-auto">
    <h1 class="text-2xl font-bold text-center mb-4">Weather App</h1>

    @auth
        <p class="text-sm text-gray-500 mb-2">Logged in as {{ auth()->user()->name }}</p>
    @endauth

    <form wire:submit.prevent="fetchWeather" class="mb-4 space-x-4">
        <input
            type="text"
            wire:model="city"
            placeholder="Enter city name"
            class="w-[25rem] p-2 border border-gray-300 rounded mb-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
        />
        @error('city') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        <button
            type="submit"
            class="w-[15rem] bg-blue-500 text-white p-2 rounded hover:bg-blue-600"
        >
            Get Weather
        </button>
    </form>

    @if (session()->has('error'))
        <div class="text-red-500 text-center mb-4">{{ session('error') }}</div>
    @endif

    @if ($weatherData)
        <div class="bg-white p-4 rounded shadow mb-4">
            <h2 class="text-lg font-semibold mb-2">Weather in {{ $weatherData['name'] }}</h2>
            <p><strong>Temperature:</strong> {{ $weatherData['main']['temp'] }}°C</p>
            <p><strong>Condition:</strong> {{ $weatherData['weather'][0]['description'] }}</p>
            <p><strong>Humidity:</strong> {{ $weatherData['main']['humidity'] }}%</p>
            <p><strong>Wind Speed:</strong> {{ $weatherData['wind']['speed'] }} m/s</p>
        </div>
    @endif

    @if ($history)
        <h3 class="text-lg font-bold mb-4">Search History</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($history as $item)
                <div class="bg-gray-100 p-3 rounded shadow">
                    <p><strong>City:</strong> {{ $item['city'] }}</p>
                    <p><strong>Temperature:</strong> {{ $item['temperature'] }}°C</p>
                    <p><strong>Condition:</strong> {{ $item['condition'] }}</p>
                    <p><strong>Time:</strong> {{ \Carbon\Carbon::parse($item['searched_at'])->format('d M Y, h:i A') }}</p>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-500">No search history available.</p>
    @endif
</div>
