<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewsandUpdates_news;
use App\Models\NewsandUpdates_upcomingupdates;


class NewsandUpdatesController extends Controller
{
    public function indexnews()
    {
        $data = NewsandUpdates_news::all();
        return view('frontend.newsandupdates.news.index', [
                'allNews' => $data
        ]);
    }

    public function indexupcomingupdates()
    {
        $upcomingupdates = NewsandUpdates_upcomingupdates::all();
            return view('frontend.newsandupdates.upcomingupdates.index',[
                    'upcomingupdates' => $upcomingupdates
            ]);
    }
}
