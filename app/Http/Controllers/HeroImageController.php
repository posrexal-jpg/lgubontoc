<?php

namespace App\Http\Controllers;

use App\Models\HeroImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class HeroImageController extends Controller
{
    private array $pages = [
        'header_banner' => 'Header Banner',
        'home' => 'Homepage',
        'tourism' => 'Tourism',
    ];

    private function uploadPath(?string $filename = null): string
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

    public function index()
    {
        return view('admin.hero-images.index', [
            'heroImages' => HeroImage::orderBy('page_key')->get()->keyBy('page_key'),
            'pages' => $this->pages,
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'page_key' => ['required', Rule::in(array_keys($this->pages))],
            'title' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'max:4096'],
            'is_active' => ['required', 'boolean'],
        ]);

        $heroImage = HeroImage::firstOrNew(['page_key' => $data['page_key']]);
        $heroImage->title = $data['title'];
        $heroImage->is_active = $data['is_active'];

        if ($request->hasFile('image')) {
            if ($heroImage->image && file_exists($this->uploadPath($heroImage->image))) {
                unlink($this->uploadPath($heroImage->image));
            }

            $file = $request->file('image');
            $filename = Str::random(30).'.'.$file->getClientOriginalExtension();
            $file->move($this->uploadPath(), $filename);
            $heroImage->image = $filename;
        }

        if (!$heroImage->image) {
            return redirect()->route('admin.hero-images.index')->with('error', 'Please upload a hero image first.');
        }

        $heroImage->save();

        return redirect()->route('admin.hero-images.index')->with('success', 'Hero image successfully saved.');
    }
}
