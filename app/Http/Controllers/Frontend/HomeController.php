<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomepageModel;
use App\Models\CarouselItem;
use App\Models\FeaturedItem;
use App\Models\HeroImage;
use App\Models\HomepageHeroSetting;
use App\Models\NewsandUpdates_news;
use App\Models\NewsandUpdates_upcomingupdates;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;

class HomeController extends Controller
{
    /**
     * Display the homepage with carousel, featured items, and news
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function home(Request $request)
    {
        // Get carousel items (cache for 1 day)
        $carouselItems = Cache::remember('carousel_items', 86400, function () {
            if (! Schema::hasTable('carousel_items')) {
                return [];
            }

            return CarouselItem::where('active', true)
                ->orderBy('sort_order', 'asc')
                ->get()
                ->toArray();
        });

        $featuredItemsData = $this->latestNewsAndAnnouncements();

        $data = [
            'carouselItems' => $carouselItems,
            'heroSetting' => Schema::hasTable('homepage_hero_settings')
                ? HomepageHeroSetting::firstOrCreate([], HomepageHeroSetting::defaults())
                : (object) HomepageHeroSetting::defaults(),
            'featuredItems' => $featuredItemsData,
            'getrecord' => $featuredItemsData, // For backward compatibility
            'pagination' => null,
            'heroImageUrl' => Schema::hasTable('hero_images')
                ? HeroImage::imageUrlFor('home', 'uploads/m1KQTRPgOCyDRFpmPxdKqjcs5rYeBN.jfif')
                : asset('uploads/m1KQTRPgOCyDRFpmPxdKqjcs5rYeBN.jfif'),
        ];

        return view('frontend.home.index', $data);
    }

    public function show($id)
    {
        $item = HomepageModel::findOrFail($id);

        return view('frontend.home.show', [
            'item' => $item,
        ]);
    }

    private function latestNewsAndAnnouncements()
    {
        $items = collect();

        if (Schema::hasTable('newsand_updates_news')) {
            $items = $items->merge(
                NewsandUpdates_news::where('status', 1)
                    ->latest('date_posted')
                    ->latest()
                    ->take(6)
                    ->get()
                    ->map(fn ($item) => $this->newsCardData($item, 'News', route('newsandupdates.news.show', $item->id)))
            );
        }

        if (Schema::hasTable('newsand_updates_upcomingupdates')) {
            $items = $items->merge(
                NewsandUpdates_upcomingupdates::where('status', 1)
                    ->latest('date_posted')
                    ->latest()
                    ->take(6)
                    ->get()
                    ->map(fn ($item) => $this->newsCardData($item, 'Announcement', route('newsandupdates.upcomingupdates.show', $item->id)))
            );
        }

        return $items
            ->sortByDesc(fn ($item) => $item['sort_date'])
            ->take(6)
            ->values()
            ->map(function ($item) {
                unset($item['sort_date']);

                return $item;
            });
    }

    private function newsCardData($item, string $category, string $link): array
    {
        $date = $item->date_posted ?: $item->created_at;

        return [
            'title' => $item->title,
            'date' => $date ? \Carbon\Carbon::parse($date)->format('M d, Y') : '',
            'description' => strip_tags((string) $item->description),
            'image' => ! empty($item->image_file) ? 'uploads/'.$item->image_file : 'resources/bontoclogonobg.png',
            'link' => $link,
            'category' => $category,
            'sort_date' => $date ? \Carbon\Carbon::parse($date)->timestamp : 0,
        ];
    }
}
