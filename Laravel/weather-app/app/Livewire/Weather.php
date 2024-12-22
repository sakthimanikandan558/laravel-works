<?php

namespace App\Livewire;

use App\Models\WeatherHistory;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class Weather extends Component
{
    public $city = '';
    public $weatherData = null;
    public $history = [];

    public function mount()
    {
        $this->loadHistory();
    }

    public function fetchWeather()
    {
        $this->validate([
            'city' => 'required|string|max:255',
        ]);

        $apiKey = env('WEATHER_API_KEY');
        $response = Http::get("http://api.openweathermap.org/data/2.5/weather", [
            'q' => $this->city,
            'appid' => $apiKey,
            'units' => 'metric',
        ]);

        if ($response->ok()) {
            $this->weatherData = $response->json();

            // Store the search in the database
            if (Auth::check()) {
                WeatherHistory::create([
                    'user_id' => Auth::id(),
                    'city' => $this->city,
                    'temperature' => $this->weatherData['main']['temp'],
                    'condition' => $this->weatherData['weather'][0]['description'],
                    'humidity' => $this->weatherData['main']['humidity'],
                    'wind_speed' => $this->weatherData['wind']['speed'],
                    'searched_at' => now(),
                ]);

                $this->loadHistory(); // Reload history
            }
        } else {
            $this->weatherData = null;
            session()->flash('error', 'City not found or API limit exceeded.');
        }
    }

    public function loadHistory()
    {
        if (Auth::check()) {
            $this->history = WeatherHistory::where('user_id', Auth::id())
                ->orderBy('searched_at', 'desc')
                ->get()
                ->toArray();
        }
    }

    public function render()
    {
        return view('livewire.weather');
    }
}
