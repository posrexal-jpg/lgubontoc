<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services_mayorsoffice;


class ServicesController extends Controller
{
    
     public function indexmayorsoffice()
    {
        $mayorsoffice = Services_mayorsoffice::first();
        return view('frontend.services.mayorsoffice.index',[
                'mayorsoffice' => $mayorsoffice
        ]);
    }

     public function indexcitizenscharter()

    {
        return view('frontend.services.citizenscharter.index');
    }
    
    public function indexbomwasa()
    {
    	return view('frontend.services.bomwasa.index');
    }
}
