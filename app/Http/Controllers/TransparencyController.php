<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transparency_municipalordinance;
use App\Models\Transparency_resolution;

class TransparencyController extends Controller
{
    public function indexmunicipalordinances() 
    {
        $municipalordinances = Transparency_municipalordinance::first();
        return view('admin.transparency.municipalordinances.index',[
                'municipalordinances' => $municipalordinances
        ]);
    }

   public function addmunicipalordinances(Request $request) 
    {
        if ($request->id) {
            $update = Transparency_municipalordinance::find($request->id);
            $update->title = $request->title;
            $update->description = $request->description;
            $update->save();
        } else {
            $formsave = new Transparency_municipalordinance();
            $formsave->title = $request->title;
            $formsave->description = $request->description;
            $formsave->save();
        }
        return redirect()->back();
    }

    public function indexresolutions() 
    {
        $resolutions = Transparency_resolution::first();
        return view('admin.transparency.resolutions.index',[
                'resolutions' => $resolutions
        ]);
    }

   public function addresolutions(Request $request) 
    {
        if ($request->id) {
            $update = Transparency_resolution::find($request->id);
            $update->title = $request->title;
            $update->description = $request->description;
            $update->save();
        } else {
            $formsave = new Transparency_resolution();
            $formsave->title = $request->title;
            $formsave->description = $request->description;
            $formsave->save();
        }
        return redirect()->back();
    }
}
