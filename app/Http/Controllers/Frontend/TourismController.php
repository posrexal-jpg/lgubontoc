<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tourism_bontocattractions;


class TourismController extends Controller
{
    public function indexbontocattractions()
    {
        $bontocattractions = Tourism_bontocattractions::all();
            return view('frontend.tourism.bontocattractions.index',[
                    'bontocattractions' => $bontocattractions
            ]);
    }
}
