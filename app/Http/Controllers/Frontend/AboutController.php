<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aboutus_history;
use App\Models\Aboutus_location;
use App\Models\Aboutus_missionandvision;
use App\Models\Aboutus_municipalityseal;
use App\Models\Aboutus_servicepledge;
use App\Models\Aboutus_mandate;
use App\Models\Aboutus_directory;

class AboutController extends Controller
{
    public function indexhistory()
    {
        $history = Aboutus_history::first();
        return view('frontend.about.history.index',[
                'history' => $history
        ]);
    }

    public function indexlocation()
    {
        $location = Aboutus_location::first();
        return view('frontend.about.location.index',[
                'location' => $location
        ]);
    }


    public function indexmissionandvision()
    {
        $missionandvision = Aboutus_missionandvision::first();
        return view('frontend.about.missionandvision.index',[
                'missionandvision' => $missionandvision
        ]);
    }

     public function indexmunicipalityseal()
    {
       $municipalityseal = Aboutus_municipalityseal::first();
        return view('frontend.about.municipalityseal.index',[
                'municipalityseal' => $municipalityseal
        ]);
    }

    public function indexmandate() 
    {
        $mandate = Aboutus_mandate::first();
        return view('frontend.about.mandate.index',[
                'mandate' => $mandate
        ]);
    }

    public function indexservicepledge() 
    {
        $servicepledge = Aboutus_servicepledge::first();
        return view('frontend.about.servicepledge.index',[
                'servicepledge' => $servicepledge
        ]);
    }

     public function indexdirectory() 
    {
       $directory = Aboutus_directory::first();
        return view('frontend.about.directory.index',[
                'directory' => $directory
        ]);
    }
}
