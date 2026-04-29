<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Announcement;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::where('status', 'active')
            ->orderBy('date_posted', 'desc')
            ->paginate(10);

        return view('frontend.announcements.index', compact('announcements'));
    }
}
