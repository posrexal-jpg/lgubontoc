<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tourism_bontocattractions;


class TourismController extends Controller
{
    public function indexbontocattractions()
    {
        $bontocattractions = Tourism_bontocattractions::latest()->get();
            return view('frontend.tourism.bontocattractions.index',[
                    'bontocattractions' => $bontocattractions
            ]);
    }

    public function showbontocattractions($id)
    {
        $attraction = Tourism_bontocattractions::findOrFail($id);

        return view('frontend.tourism.bontocattractions.show', [
            'attraction' => $attraction,
        ]);
    }
}
