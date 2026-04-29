<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tourism_bontocattractions;

class TourismController extends Controller
{
    public function indexbontocattractions() 
    {
        $bontocattractions = Tourism_bontocattractions::all();
        return view('admin.tourism.bontocattractions.index',[
                'bontocattractions' => $bontocattractions
        ]);
    }

    public function addbontocattractions(Request $request) 
    {
        
            $formsave = new Tourism_bontocattractions();
            $formsave->title = $request->title;
            $formsave->description = $request->description;
        
            $formsave->save();
        // }
        return redirect()->back();
    }
}
