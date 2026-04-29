<?php

namespace App\Http\Controllers;

use App\Models\GovernmentOfficial;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class GovernmentOfficialController extends Controller
{
    private array $categories = [
        'elected' => 'Elected Officials',
        'legislative' => 'Legislative',
    ];

    private function uploadPath(?string $filename = null): string
    {
        $path = public_path('uploads/government-officials');

        if (!is_dir($path)) {
            mkdir($path, 0755, true);
        }

        if (!is_writable($path)) {
            @chmod($path, 0775);
        }

        return $filename ? $path.DIRECTORY_SEPARATOR.$filename : $path;
    }

    public function index(Request $request)
    {
        $category = $request->query('category');

        $officials = GovernmentOfficial::query()
            ->when($category && array_key_exists($category, $this->categories), fn ($query) => $query->where('category', $category))
            ->orderBy('category')
            ->orderBy('sort_order')
            ->orderBy('name')
            ->paginate(10)
            ->withQueryString();

        return view('admin.government.officials.index', [
            'officials' => $officials,
            'categories' => $this->categories,
            'selectedCategory' => $category,
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);

        if ($request->hasFile('photo')) {
            $data['photo'] = $this->storePhoto($request);
        }

        GovernmentOfficial::create($data);

        return redirect()->route('admin.government.officials.index', ['category' => $data['category']])
            ->with('success', 'Government official successfully added.');
    }

    public function update(Request $request, int $id)
    {
        $official = GovernmentOfficial::findOrFail($id);
        $data = $this->validatedData($request);

        if ($request->hasFile('photo')) {
            $this->deletePhoto($official->photo);
            $data['photo'] = $this->storePhoto($request);
        }

        $official->update($data);

        return redirect()->route('admin.government.officials.index', ['category' => $data['category']])
            ->with('success', 'Government official successfully updated.');
    }

    public function destroy(int $id)
    {
        $official = GovernmentOfficial::findOrFail($id);
        $category = $official->category;

        $this->deletePhoto($official->photo);
        $official->delete();

        return redirect()->route('admin.government.officials.index', ['category' => $category])
            ->with('error', 'Government official successfully deleted.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'category' => ['required', Rule::in(array_keys($this->categories))],
            'name' => ['required', 'string', 'max:255'],
            'position' => ['required', 'string', 'max:255'],
            'photo' => ['nullable', 'image', 'max:4096'],
            'description' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_published' => ['required', 'boolean'],
        ]);
    }

    private function storePhoto(Request $request): string
    {
        $file = $request->file('photo');
        $filename = Str::random(30).'.'.$file->getClientOriginalExtension();
        $file->move($this->uploadPath(), $filename);

        return $filename;
    }

    private function deletePhoto(?string $filename): void
    {
        if ($filename && file_exists($this->uploadPath($filename))) {
            unlink($this->uploadPath($filename));
        }
    }
}
