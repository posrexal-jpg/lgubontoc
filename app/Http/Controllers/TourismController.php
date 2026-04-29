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
                'bontocattractions' => $bontocattractions,
                'bontocattraction' => null,
        ]);
    }

    public function editbontocattractions($id)
    {
        $bontocattractions = Tourism_bontocattractions::all();
        $bontocattraction = Tourism_bontocattractions::findOrFail($id);

        return view('admin.tourism.bontocattractions.index',[
                'bontocattractions' => $bontocattractions,
                'bontocattraction' => $bontocattraction,
        ]);
    }

    public function showbontocattractions($id)
    {
        $bontocattraction = Tourism_bontocattractions::findOrFail($id);

        return view('admin.tourism.bontocattractions.show',[
                'bontocattraction' => $bontocattraction,
        ]);
    }

    public function addbontocattractions(Request $request) 
    {
        if ($request->id) {
            $formsave = Tourism_bontocattractions::findOrFail($request->id);
        } else {
            $formsave = new Tourism_bontocattractions();
        }

        $formsave->title = $request->title;
        $formsave->description = $request->description;
        $formsave->save();

        return redirect()->route('admin.tourism.bontocattractions')->with('success', 'Bontoc attraction successfully saved.');
    }

    public function deletebontocattractions($id)
    {
        Tourism_bontocattractions::findOrFail($id)->delete();

        return redirect()->route('admin.tourism.bontocattractions')->with('error', 'Bontoc attraction successfully deleted.');
    }
}
