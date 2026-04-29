<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services_mayorsoffice;


class ServicesController extends Controller
{
     public function indexmayorsoffice() 
    {
        $mayorsoffice = Services_mayorsoffice::first();
        return view('admin.services.mayorsoffice.index',[
                'mayorsoffice' => $mayorsoffice
        ]);
    }

   public function addmayorsoffice(Request $request) 
    {
        if ($request->id) {
            $update = Services_mayorsoffice::find($request->id);
            $update->title = $request->title;
            $update->description = $request->description;
            $update->save();
        } else {
            $formsave = new Services_mayorsoffice();
            $formsave->title = $request->title;
            $formsave->description = $request->description;
            $formsave->save();
        }
        return redirect()->back();
    }
}
