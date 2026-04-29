<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomepageModel;
use App\Models\CarouselItem;
use App\Models\FeaturedItem;
use App\Models\Announcement;
use Illuminate\Support\Facades\Cache;

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
                'link' => '#',
                'category' => 'News'
            ];
        });

        // Get latest announcements for the ticker
        $announcements = Cache::remember('homepage_announcements', 3600, function () {
            return Announcement::where('status', 'active')
                ->orderBy('date_posted', 'desc')
                ->limit(10)
                ->get();
        });

        $data = [
            'carouselItems' => $carouselItems,
            'featuredItems' => $featuredItemsData,
            'getrecord' => $featuredItemsData, // For backward compatibility
            'pagination' => $featuredItems, // For pagination links
            'announcements' => $announcements
        ];

        return view('frontend.home.index', $data);
    }
}
