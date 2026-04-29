<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HeroImage;
use App\Models\Tourism_bontocattractions;


class TourismController extends Controller
{
    public function indexbontocattractions()
    {
        $bontocattractions = Tourism_bontocattractions::with('photos')->latest()->get();
            return view('frontend.tourism.bontocattractions.index',[
                    'bontocattractions' => $bontocattractions,
                    'heroImageUrl' => HeroImage::imageUrlFor('tourism', 'uploads/m1KQTRPgOCyDRFpmPxdKqjcs5rYeBN.jfif'),
            ]);
    }

    public function showbontocattractions($id)
    {
        $attraction = Tourism_bontocattractions::with('photos')->findOrFail($id);

        return view('frontend.tourism.bontocattractions.show', [
            'attraction' => $attraction,
        ]);
    }
}
