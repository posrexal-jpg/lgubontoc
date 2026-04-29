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
        $data = NewsandUpdates_news::latest()->get();
        $advisories = NewsandUpdates_upcomingupdates::latest()->take(5)->get();

        return view('frontend.newsandupdates.news.index', [
                'allNews' => $data,
                'advisories' => $advisories,
        ]);
    }

    public function shownews($id)
    {
        $news = NewsandUpdates_news::findOrFail($id);

        return view('frontend.newsandupdates.news.show', [
            'news' => $news,
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

        return view('frontend.newsandupdates.upcomingupdates.show', [
            'upcomingupdate' => $upcomingupdate,
        ]);
    }
}
