<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Others_downloadableforms;
use App\Models\Others_gallery;
use App\Models\Others_memorandom;
use Illuminate\Support\Str;

class OthersController extends Controller
{
    private function downloadableFormsPath(?string $filename = null): string
    {
        $path = public_path('uploads/downloadable-forms');

        if (!is_dir($path)) {
            mkdir($path, 0755, true);
        }

        if (!is_writable($path)) {
            @chmod($path, 0775);
        }

        return $filename ? $path.DIRECTORY_SEPARATOR.$filename : $path;
    }

    private function routes(string $name): array
    {
        return [
            'index' => "admin.others.$name",
            'save' => "admin.others.$name.add",
            'show' => "admin.others.$name.show",
            'edit' => "admin.others.$name.edit",
            'delete' => "admin.others.$name.delete",
        ];
    }

    public function indexdownloadableforms() 
    {
        $downloadableforms = Others_downloadableforms::orderBy('sort_order')
            ->orderBy('title')
            ->paginate(10);

        return view('admin.others.downloadableforms.index', [
            'downloadableforms' => $downloadableforms,
        ]);
    }

   public function adddownloadableforms(Request $request) 
    {
        $data = $request->validate([
            'id' => ['nullable', 'integer', 'exists:others_downloadableforms,id'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'form_file' => ['nullable', 'file', 'mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png', 'max:10240'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_published' => ['required', 'boolean'],
        ]);

        $form = !empty($data['id'])
            ? Others_downloadableforms::findOrFail($data['id'])
            : new Others_downloadableforms();

        $form->title = $data['title'];
        $form->description = $data['description'] ?? null;
        $form->sort_order = $data['sort_order'] ?? 0;
        $form->is_published = $data['is_published'];

        if ($request->hasFile('form_file')) {
            if ($form->file_path && file_exists($this->downloadableFormsPath($form->file_path))) {
                unlink($this->downloadableFormsPath($form->file_path));
            }

            $file = $request->file('form_file');
            $filename = Str::random(30).'.'.$file->getClientOriginalExtension();
            $file->move($this->downloadableFormsPath(), $filename);
            $form->file_path = $filename;
            $form->file_name = $file->getClientOriginalName();
        }

        $form->save();

        return redirect()->route('admin.others.downloadableforms')->with('success', 'Downloadable form successfully saved.');
    }
    public function showdownloadableforms($id)
    {
        return view('admin.others.downloadableforms.show', [
            'form' => Others_downloadableforms::findOrFail($id),
        ]);
    }
    public function editdownloadableforms($id)
    {
        return redirect()->route('admin.others.downloadableforms', ['edit' => $id]);
    }
    public function deletedownloadableforms($id)
    {
        $form = Others_downloadableforms::findOrFail($id);

        if ($form->file_path && file_exists($this->downloadableFormsPath($form->file_path))) {
            unlink($this->downloadableFormsPath($form->file_path));
        }

        $form->delete();

        return redirect()->route('admin.others.downloadableforms')->with('error', 'Downloadable form successfully deleted.');
    }

    public function indexgallery() 
    {
        return $this->browseSimpleContent(Others_gallery::class, 'Gallery', $this->routes('gallery'));
    }

   public function addgallery(Request $request) 
    {
        return $this->saveSimpleContent($request, Others_gallery::class, 'admin.others.gallery');
    }
    public function showgallery($id) { return $this->readSimpleContent(Others_gallery::class, 'Gallery', $this->routes('gallery'), $id); }
    public function editgallery($id) { return $this->browseSimpleContent(Others_gallery::class, 'Gallery', $this->routes('gallery'), Others_gallery::findOrFail($id)); }
    public function deletegallery($id) { return $this->deleteSimpleContent(Others_gallery::class, 'admin.others.gallery', $id); }

   public function indexmemorandom() 
    {
        return $this->browseSimpleContent(Others_memorandom::class, 'Memorandum', $this->routes('memorandom'));
    }

   public function addmemorandom(Request $request) 
    {
        return $this->saveSimpleContent($request, Others_memorandom::class, 'admin.others.memorandom');
    }
    public function showmemorandom($id) { return $this->readSimpleContent(Others_memorandom::class, 'Memorandum', $this->routes('memorandom'), $id); }
    public function editmemorandom($id) { return $this->browseSimpleContent(Others_memorandom::class, 'Memorandum', $this->routes('memorandom'), Others_memorandom::findOrFail($id)); }
    public function deletememorandom($id) { return $this->deleteSimpleContent(Others_memorandom::class, 'admin.others.memorandom', $id); }
}
