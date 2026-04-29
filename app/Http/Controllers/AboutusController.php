<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aboutus_history;
use App\Models\Aboutus_location;
use App\Models\Aboutus_missionandvision;
use App\Models\Aboutus_municipalityseal;
use App\Models\Aboutus_servicepledge;
use App\Models\Aboutus_mandate;
use App\Models\Aboutus_directory;

class AboutusController extends Controller
{
    public function indexhistory() 
    {
        $history = Aboutus_history::first();
        return view('admin.aboutus.history.index',[
                'history' => $history
        ]);
    }
    
    public function addhistory(Request $request) 
    {
        if ($request->id) {
            $update = Aboutus_history::find($request->id);
            $update->title = $request->title;
            $update->description = $request->description;
            $update->save();
        } else {
            $formsave = new Aboutus_history();
            $formsave->title = $request->title;
            $formsave->description = $request->description;
            $formsave->save();
        }
        return redirect()->back();
    }

    public function indexlocation() 
    {
       $location = Aboutus_location::first();
        return view('admin.aboutus.location.index',[
            'location' => $location
        ]);
    }

    public function addlocation(Request $request) 
    {
        if ($request->id) {
            $update = Aboutus_location::find($request->id);
            $update->title = $request->title;
            $update->description = $request->description;
            $update->save();
        } else {
            $formsave = new Aboutus_location();
            $formsave->title = $request->title;
            $formsave->description = $request->description;
            $formsave->save();
        }
        return redirect()->back();
    }


    public function indexmissionandvision() 
    {
       $missionandvision = Aboutus_missionandvision::first();
        return view('admin.aboutus.missionandvision.index',[
            'missionandvision' => $missionandvision
        ]);
    }
    public function addmissionandvision(Request $request) 
    {
        if ($request->id) {
            $update = Aboutus_missionandvision::find($request->id);
            $update->title = $request->title;
            $update->description = $request->description;
            $update->save();
        } else {
            $formsave = new Aboutus_missionandvision();
            $formsave->title = $request->title;
            $formsave->description = $request->description;
            $formsave->save();
        }
        return redirect()->back();
    }

    public function indexmunicipalityseal() 
    {
        $municipalityseal = Aboutus_municipalityseal::first();
        return view('admin.aboutus.municipalityseal.index',[
                'municipalityseal' => $municipalityseal
        ]);
    }
    public function addmunicipalityseal(Request $request) 
    {
        if ($request->id) {
            $update = Aboutus_municipalityseal::find($request->id);
            $update->title = $request->title;
            $update->description = $request->description;
            $update->save();
        } else {
            $formsave = new Aboutus_municipalityseal();
            $formsave->title = $request->title;
            $formsave->description = $request->description;
            $formsave->save();
        }
        return redirect()->back();
    }


    public function indexservicepledge() 
    {
       $servicepledge = Aboutus_servicepledge::first();
        return view('admin.aboutus.servicepledge.index',[
                'servicepledge' => $servicepledge
        ]);
    }
    public function addservicepledge(Request $request) 
    {
        if ($request->id) {
            $update = Aboutus_servicepledge::find($request->id);
            $update->title = $request->title;
            $update->description = $request->description;
            $update->save();
        } else {
            $formsave = new Aboutus_servicepledge();
            $formsave->title = $request->title;
            $formsave->description = $request->description;
            $formsave->save();
        }
        return redirect()->back();
    }


    public function indexmandate() 
    {
       $mandate = Aboutus_mandate::first();
        return view('admin.aboutus.mandate.index',[
                'mandate' => $mandate
        ]);
    }
    public function addmandate(Request $request) 
    {
        if ($request->id) {
            $update = Aboutus_mandate::find($request->id);
            $update->title = $request->title;
            $update->description = $request->description;
            $update->save();
        } else {
            $formsave = new Aboutus_mandate();
            $formsave->title = $request->title;
            $formsave->description = $request->description;
            $formsave->save();
        }
        return redirect()->back();
    }

    public function indexdirectory() 
    {
        $directory = Aboutus_directory::first();
        return view('admin.aboutus.directory.index',[
                'directory' => $directory
        ]);
    }
    public function adddirectory(Request $request) 
    {
        if ($request->id) {
            $update = Aboutus_directory::find($request->id);
            $update->title = $request->title;
            $update->description = $request->description;
            $update->save();
        } else {
            $formsave = new Aboutus_directory();
            $formsave->title = $request->title;
            $formsave->description = $request->description;
            $formsave->save();
        }
        return redirect()->back();
    }

}