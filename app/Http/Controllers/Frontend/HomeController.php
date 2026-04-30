<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomepageModel;
use App\Models\CarouselItem;
use App\Models\FeaturedItem;
use App\Models\HeroImage;
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

        // Get featured items with pagination (6 items per page)
        $featuredItems = HomepageModel::orderBy('date_posted', 'desc')
            ->paginate(6);

        // Transform featured items for component
        $featuredItemsData = $featuredItems->map(function ($item) {
            return [
                'title' => $item->title,
                'date' => $item->date_posted,
                'description' => $item->description,
                'image' => 'public/home/' . $item->image,
                'link' => route('home.show', $item->id),
                'category' => 'News'
            ];
        });

        $data = [
            'carouselItems' => $carouselItems,
            'featuredItems' => $featuredItemsData,
            'getrecord' => $featuredItemsData, // For backward compatibility
            'pagination' => $featuredItems, // For pagination links
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
}
