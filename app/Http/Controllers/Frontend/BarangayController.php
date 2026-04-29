<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Barangay;

class BarangayController extends Controller
{
    public function index()
    {
        $barangays = Barangay::where('active', true)
            ->orderBy('name', 'asc')
            ->get();

        return view('frontend.barangays.index', compact('barangays'));
    }
}
