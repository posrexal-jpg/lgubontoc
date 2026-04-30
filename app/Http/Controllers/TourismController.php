<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeroImage;
use App\Models\TourismAttractionPhoto;
use App\Models\Tourism_bontocattractions;
use Illuminate\Support\Str;

class TourismController extends Controller
{
    private function uploadPath(?string $filename = null): string
    {
        $path = public_path('uploads');

        if (!is_dir($path)) {
            mkdir($path, 0755, true);
        }

        if (!is_writable($path)) {
            @chmod($path, 0775);
        }

        return $filename ? $path.DIRECTORY_SEPARATOR.$filename : $path;
    }

    private function heroUploadPath(?string $filename = null): string
    {
        $path = public_path('uploads/hero-images');

        if (!is_dir($path)) {
            mkdir($path, 0755, true);
        }

        if (!is_writable($path)) {
            @chmod($path, 0775);
        }

        return $filename ? $path.DIRECTORY_SEPARATOR.$filename : $path;
    }

    public function indexbontocattractions() 
    {
        $bontocattractions = Tourism_bontocattractions::with('photos')->latest()->get();
        return view('admin.tourism.bontocattractions.index',[
                'bontocattractions' => $bontocattractions,
                'bontocattraction' => null,
                'tourismHero' => HeroImage::where('page_key', 'tourism')->first(),
        ]);
    }

    public function editbontocattractions($id)
    {
        $bontocattractions = Tourism_bontocattractions::with('photos')->latest()->get();
        $bontocattraction = Tourism_bontocattractions::with('photos')->findOrFail($id);

        return view('admin.tourism.bontocattractions.index',[
                'bontocattractions' => $bontocattractions,
                'bontocattraction' => $bontocattraction,
                'tourismHero' => HeroImage::where('page_key', 'tourism')->first(),
        ]);
    }

    public function updateHero(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'max:4096'],
            'is_active' => ['required', 'boolean'],
        ]);

        $heroImage = HeroImage::firstOrNew(['page_key' => 'tourism']);
        $heroImage->title = $data['title'];
        $heroImage->is_active = $data['is_active'];

        if ($request->hasFile('image')) {
            if ($heroImage->image && file_exists($this->heroUploadPath($heroImage->image))) {
                unlink($this->heroUploadPath($heroImage->image));
            }

            $file = $request->file('image');
            $filename = Str::random(30).'.'.$file->getClientOriginalExtension();
            $file->move($this->heroUploadPath(), $filename);
            $heroImage->image = $filename;
        }

        if (!$heroImage->image) {
            return redirect()->route('admin.tourism.bontocattractions')->with('error', 'Please upload a tourism hero image first.');
        }

        $heroImage->save();

        return redirect()->route('admin.tourism.bontocattractions')->with('success', 'Tourism hero image successfully saved.');
    }

    public function showbontocattractions($id)
    {
        $bontocattraction = Tourism_bontocattractions::with('photos')->findOrFail($id);

        return view('admin.tourism.bontocattractions.show',[
                'bontocattraction' => $bontocattraction,
        ]);
    }

    public function addbontocattractions(Request $request) 
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image_file' => ['nullable', 'image', 'max:4096'],
            'photos.*' => ['nullable', 'image', 'max:4096'],
        ]);

        if ($request->id) {
            $formsave = Tourism_bontocattractions::findOrFail($request->id);
        } else {
            $formsave = new Tourism_bontocattractions();
        }

        $formsave->title = $request->title;
        $formsave->category = $request->category;
        $formsave->description = $request->description;

        if ($request->hasFile('image_file')) {
            if (!empty($formsave->image_file) && file_exists($this->uploadPath($formsave->image_file))) {
                unlink($this->uploadPath($formsave->image_file));
            }

            $file = $request->file('image_file');
            $filename = Str::random(30).'.'.$file->getClientOriginalExtension();
            $file->move($this->uploadPath(), $filename);
            $formsave->image_file = $filename;
        }

        $formsave->save();

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $filename = Str::random(30).'.'.$photo->getClientOriginalExtension();
                $photo->move($this->uploadPath(), $filename);

                TourismAttractionPhoto::create([
                    'tourism_bontocattraction_id' => $formsave->id,
                    'image_file' => $filename,
                ]);
            }
        }

        return redirect()->route('admin.tourism.bontocattractions')->with('success', 'Bontoc attraction successfully saved.');
    }

    public function deletebontocattractionphoto($id)
    {
        $photo = TourismAttractionPhoto::findOrFail($id);

        if (!empty($photo->image_file) && file_exists($this->uploadPath($photo->image_file))) {
            unlink($this->uploadPath($photo->image_file));
        }

        $photo->delete();

        return redirect()->back()->with('error', 'Tourism photo successfully deleted.');
    }

    public function deletebontocattractions($id)
    {
        $bontocattraction = Tourism_bontocattractions::with('photos')->findOrFail($id);

        if (!empty($bontocattraction->image_file) && file_exists($this->uploadPath($bontocattraction->image_file))) {
            unlink($this->uploadPath($bontocattraction->image_file));
        }

        foreach ($bontocattraction->photos as $photo) {
            if (!empty($photo->image_file) && file_exists($this->uploadPath($photo->image_file))) {
                unlink($this->uploadPath($photo->image_file));
            }
        }

        $bontocattraction->delete();

        return redirect()->route('admin.tourism.bontocattractions')->with('error', 'Bontoc attraction successfully deleted.');
    }
}
