<?php

namespace App\Http\Controllers;

use App\Models\CarouselItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class CarouselItemController extends Controller
{
    private function uploadPath(?string $filename = null): string
    {
        $path = public_path('uploads/carousel');

        if (! is_dir($path)) {
            mkdir($path, 0755, true);
        }

        if (! is_writable($path)) {
            @chmod($path, 0775);
        }

        return $filename ? $path.DIRECTORY_SEPARATOR.$filename : $path;
    }

    public function index()
    {
        return view('admin.carousel.index', [
            'items' => CarouselItem::orderBy('sort_order')->orderBy('id')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request, true);
        $data['image'] = $this->storeImage($request);

        CarouselItem::create($data);
        Cache::forget('carousel_items');

        return redirect()->route('admin.carousel.index')->with('success', 'Carousel slide successfully added.');
    }

    public function update(Request $request, int $id)
    {
        $item = CarouselItem::findOrFail($id);
        $data = $this->validatedData($request, false);

        if ($request->hasFile('image')) {
            $this->deleteUploadedImage($item->image);
            $data['image'] = $this->storeImage($request);
        }

        $item->update($data);
        Cache::forget('carousel_items');

        return redirect()->route('admin.carousel.index')->with('success', 'Carousel slide successfully updated.');
    }

    public function destroy(int $id)
    {
        $item = CarouselItem::findOrFail($id);
        $this->deleteUploadedImage($item->image);
        $item->delete();
        Cache::forget('carousel_items');

        return redirect()->route('admin.carousel.index')->with('error', 'Carousel slide successfully deleted.');
    }

    private function validatedData(Request $request, bool $imageRequired): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'active' => ['required', 'boolean'],
            'image' => [$imageRequired ? 'required' : 'nullable', 'image', 'max:4096'],
        ]);
    }

    private function storeImage(Request $request): string
    {
        $file = $request->file('image');
        $filename = Str::random(30).'.'.$file->getClientOriginalExtension();
        $file->move($this->uploadPath(), $filename);

        return 'uploads/carousel/'.$filename;
    }

    private function deleteUploadedImage(?string $image): void
    {
        if (! $image || ! str_starts_with($image, 'uploads/carousel/')) {
            return;
        }

        $filename = basename($image);
        $path = $this->uploadPath($filename);

        if (file_exists($path)) {
            unlink($path);
        }
    }
}
