<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transparency_municipalordinance;
use App\Models\Transparency_resolution;


class TransparencyController extends Controller
{

public function indexmunicipalordinances()
    {
        $municipalordinances = Transparency_municipalordinance::first();
            return view('frontend.transparency.municipalordinances.index',[
                    'municipalordinances' => $municipalordinances
            ]);
     }


public function indexresolutions()
    {
        $resolutions = Transparency_resolution::first();
            return view('frontend.transparency.resolutions.index',[
                    'resolutions' => $resolutions
            ]);
     }
}
