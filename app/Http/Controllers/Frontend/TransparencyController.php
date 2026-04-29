<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transparency_municipalordinance;
use App\Models\Transparency_resolution;
use App\Models\TransparencyFdpReport;


class TransparencyController extends Controller
{

public function indexmunicipalordinances()
    {
        $municipalordinances = Transparency_municipalordinance::latest()->first();
            return view('frontend.transparency.municipalordinances.index',[
                    'municipalordinances' => $municipalordinances
            ]);
     }


public function indexresolutions()
    {
        $resolutions = Transparency_resolution::latest()->first();
            return view('frontend.transparency.resolutions.index',[
                    'resolutions' => $resolutions
            ]);
     }

public function indexFdpReports()
    {
        $reports = TransparencyFdpReport::where('is_published', true)
            ->orderByDesc('year')
            ->orderBy('sort_order')
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('frontend.transparency.fdp-reports.index', [
            'reports' => $reports,
        ]);
     }
}
