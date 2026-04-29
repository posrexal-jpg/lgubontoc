<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Others_downloadableforms;
use App\Models\Others_gallery;
use App\Models\Others_memorandom;

class OthersController extends Controller
{
    public function indexdownloadableforms() 
    {
        $downloadableforms = Others_downloadableforms::first();
        return view('admin.others.downloadableforms.index',[
                'downloadableforms' => $downloadableforms
        ]);
    }

   public function adddownloadableforms(Request $request) 
    {
        if ($request->id) {
            $update = Others_downloadableforms::find($request->id);
            $update->title = $request->title;
            $update->description = $request->description;
            $update->save();
        } else {
            $formsave = new Others_downloadableforms();
            $formsave->title = $request->title;
            $formsave->description = $request->description;
            $formsave->save();
        }
        return redirect()->back();
    }

    public function indexgallery() 
    {
        $gallery = Others_gallery::first();
        return view('admin.others.gallery.list',[
                'gallery' => $gallery
        ]);
    }

   public function addgallery(Request $request) 
    {
        if ($request->id) {
            $update = Others_gallery::find($request->id);
            $update->title = $request->title;
            $update->description = $request->description;
            $update->save();
        } else {
            $formsave = new Others_gallery();
            $formsave->title = $request->title;
            $formsave->description = $request->description;
            $formsave->save();
        }
        return redirect()->back();
    }

   public function indexmemorandom() 
    {
        $memorandom = Others_memorandom::first();
        return view('admin.others.memorandom.index',[
                'memorandom' => $memorandom
        ]);
    }

   public function addmemorandom(Request $request) 
    {
        if ($request->id) {
            $update = Others_memorandom::find($request->id);
            $update->title = $request->title;
            $update->description = $request->description;
            
            $update->save();
        } else {
            $formsave = new Others_memorandom();
            $formsave->title = $request->title;
            $formsave->description = $request->description;

            $formsave->save();
        }
        return redirect()->back();
    }
}
