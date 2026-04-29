<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Others_downloadableforms;
use App\Models\Others_gallery;
use App\Models\Others_memorandom;

class OthersController extends Controller
{
    public function indexdownloadableforms()
    {
        $downloadableforms = Others_downloadableforms::where('is_published', true)
            ->orderBy('sort_order')
            ->orderBy('title')
            ->get();

        return view('frontend.others.downloadableforms.index',[
                'downloadableforms' => $downloadableforms
        ]);
    }


    public function indexgallery()
    {
        $gallery = Others_gallery::latest()->get();
        return view('frontend.others.gallery.index',[
                'gallery' => $gallery
        ]);
    }

    public function showgallery($id)
    {
        $gallery = Others_gallery::findOrFail($id);

        return view('frontend.others.gallery.show', [
            'gallery' => $gallery,
        ]);
    }


    public function indexmemorandom()
    {
        $memorandom = Others_memorandom::latest()->first();
        return view('frontend.others.memorandom.index',[
                'memorandom' => $memorandom
        ]);
    }

}
