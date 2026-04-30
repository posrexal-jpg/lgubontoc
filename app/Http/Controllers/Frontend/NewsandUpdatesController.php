<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewsandUpdates_news;
use App\Models\NewsandUpdates_upcomingupdates;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;


class NewsandUpdatesController extends Controller
{
    public function indexnews()
    {
        $data = NewsandUpdates_news::latest()->get();
        $advisories = NewsandUpdates_upcomingupdates::latest()->take(5)->get();
        $weather = $this->bontocWeather();

        return view('frontend.newsandupdates.news.index', [
                'allNews' => $data,
                'advisories' => $advisories,
                'weather' => $weather,
        ]);
    }

    public function shownews($id)
    {
        $news = NewsandUpdates_news::findOrFail($id);
        $relatedNews = NewsandUpdates_news::whereKeyNot($news->getKey())
            ->latest()
            ->take(3)
            ->get();

        return view('frontend.newsandupdates.news.show', [
            'news' => $news,
            'relatedNews' => $relatedNews,
        ]);
    }

    public function indexupcomingupdates()
    {
        $upcomingupdates = NewsandUpdates_upcomingupdates::latest()->get();
            return view('frontend.newsandupdates.upcomingupdates.index',[
                    'upcomingupdates' => $upcomingupdates
            ]);
    }

    public function showupcomingupdates($id)
    {
        $upcomingupdate = NewsandUpdates_upcomingupdates::findOrFail($id);
        $relatedUpdates = NewsandUpdates_upcomingupdates::whereKeyNot($upcomingupdate->getKey())
            ->latest()
            ->take(3)
            ->get();

        return view('frontend.newsandupdates.upcomingupdates.show', [
            'upcomingupdate' => $upcomingupdate,
            'relatedUpdates' => $relatedUpdates,
        ]);
    }

    private function bontocWeather(): ?array
    {
        return Cache::remember('bontoc_weather_current', now()->addMinutes(30), function () {
            try {
                $response = Http::timeout(6)->get('https://api.open-meteo.com/v1/forecast', [
                    'latitude' => 10.3556,
                    'longitude' => 124.9697,
                    'current' => 'temperature_2m,relative_humidity_2m,weather_code,wind_speed_10m',
                    'timezone' => 'Asia/Manila',
                ]);

                if (! $response->successful()) {
                    return null;
                }

                $current = $response->json('current');

                if (! is_array($current)) {
                    return null;
                }

                return [
                    'temperature' => $current['temperature_2m'] ?? null,
                    'humidity' => $current['relative_humidity_2m'] ?? null,
                    'wind_speed' => $current['wind_speed_10m'] ?? null,
                    'condition' => $this->weatherCondition((int) ($current['weather_code'] ?? -1)),
                    'time' => $current['time'] ?? null,
                ];
            } catch (\Throwable $exception) {
                return null;
            }
        });
    }

    private function weatherCondition(int $code): string
    {
        return match (true) {
            $code === 0 => 'Clear sky',
            in_array($code, [1, 2, 3], true) => 'Partly cloudy',
            in_array($code, [45, 48], true) => 'Foggy',
            in_array($code, [51, 53, 55, 56, 57], true) => 'Drizzle',
            in_array($code, [61, 63, 65, 66, 67], true) => 'Rain',
            in_array($code, [80, 81, 82], true) => 'Rain showers',
            in_array($code, [95, 96, 99], true) => 'Thunderstorm',
            default => 'Weather update',
        };
    }
}
