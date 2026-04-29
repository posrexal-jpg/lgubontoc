<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\GovernmentOfficial;

class GovernmentController extends Controller
{
    public function indexofficials()
    {
        $officials = GovernmentOfficial::where('active', true)
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('frontend.government.officials.index', compact('officials'));
    }
}
