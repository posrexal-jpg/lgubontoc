<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transparency_municipalordinance;
use App\Models\Transparency_resolution;
use Illuminate\Support\Str;

class TransparencyController extends Controller
{
    private function routes(string $name): array
    {
        return [
            'index' => "admin.transparency.$name",
            'save' => "admin.transparency.$name.add",
            'show' => "admin.transparency.$name.show",
            'edit' => "admin.transparency.$name.edit",
            'delete' => "admin.transparency.$name.delete",
        ];
    }

    public function indexmunicipalordinances() 
    {
        return $this->browseSbDocuments(Transparency_municipalordinance::class, 'SB Ordinances', 'sb-ordinances', $this->routes('municipalordinances'));
    }

   public function addmunicipalordinances(Request $request) 
    {
        return $this->saveSbDocument($request, Transparency_municipalordinance::class, 'sb-ordinances', 'admin.transparency.municipalordinances');
    }
    public function showmunicipalordinances($id) { return $this->readSbDocument(Transparency_municipalordinance::class, 'SB Ordinances', 'sb-ordinances', $this->routes('municipalordinances'), $id); }
    public function editmunicipalordinances($id) { return redirect()->route('admin.transparency.municipalordinances'); }
    public function deletemunicipalordinances($id) { return $this->deleteSbDocument(Transparency_municipalordinance::class, 'sb-ordinances', 'admin.transparency.municipalordinances', $id); }

    public function indexresolutions() 
    {
        return $this->browseSbDocuments(Transparency_resolution::class, 'SB Resolutions', 'sb-resolutions', $this->routes('resolutions'));
    }

   public function addresolutions(Request $request) 
    {
        return $this->saveSbDocument($request, Transparency_resolution::class, 'sb-resolutions', 'admin.transparency.resolutions');
    }
    public function showresolutions($id) { return $this->readSbDocument(Transparency_resolution::class, 'SB Resolutions', 'sb-resolutions', $this->routes('resolutions'), $id); }
    public function editresolutions($id) { return redirect()->route('admin.transparency.resolutions'); }
    public function deleteresolutions($id) { return $this->deleteSbDocument(Transparency_resolution::class, 'sb-resolutions', 'admin.transparency.resolutions', $id); }

    private function browseSbDocuments(string $modelClass, string $heading, string $folder, array $routes)
    {
        $documents = $modelClass::orderByDesc('year')
            ->orderBy('sort_order')
            ->orderByDesc('approved_date')
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('admin.transparency.sb-documents.index', [
            'documents' => $documents,
            'heading' => $heading,
            'folder' => $folder,
            'routes' => $routes,
        ]);
    }

    private function readSbDocument(string $modelClass, string $heading, string $folder, array $routes, int $id)
    {
        return view('admin.transparency.sb-documents.show', [
            'document' => $modelClass::findOrFail($id),
            'heading' => $heading,
            'folder' => $folder,
            'routes' => $routes,
        ]);
    }

    private function saveSbDocument(Request $request, string $modelClass, string $folder, string $indexRoute)
    {
        $data = $request->validate([
            'id' => ['nullable', 'integer'],
            'title' => ['required', 'string', 'max:255'],
            'document_number' => ['nullable', 'string', 'max:120'],
            'description' => ['nullable', 'string'],
            'approved_date' => ['nullable', 'date'],
            'year' => ['nullable', 'integer', 'min:1900', 'max:2100'],
            'status' => ['nullable', 'string', 'max:80'],
            'file' => ['nullable', 'file', 'mimes:pdf,doc,docx,jpg,jpeg,png', 'max:10240'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_published' => ['required', 'boolean'],
        ]);

        $document = $request->id ? $modelClass::findOrFail($request->id) : new $modelClass();
        $data['status'] = $data['status'] ?? 'Approved';
        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['year'] = $data['year'] ?? ($request->approved_date ? (int) date('Y', strtotime($request->approved_date)) : null);

        unset($data['id'], $data['file']);

        if ($request->hasFile('file')) {
            $this->deleteFile($folder, $document->file_path);
            $data = array_merge($data, $this->storeFile($request, $folder));
        }

        $document->fill($data)->save();

        return redirect()->route($indexRoute)->with('success', 'SB document successfully saved.');
    }

    private function deleteSbDocument(string $modelClass, string $folder, string $indexRoute, int $id)
    {
        $document = $modelClass::findOrFail($id);
        $this->deleteFile($folder, $document->file_path);
        $document->delete();

        return redirect()->route($indexRoute)->with('error', 'SB document successfully deleted.');
    }

    private function uploadPath(string $folder, ?string $filename = null): string
    {
        $path = public_path('uploads/'.$folder);

        if (! is_dir($path)) {
            mkdir($path, 0755, true);
        }

        if (! is_writable($path)) {
            @chmod($path, 0775);
        }

        return $filename ? $path.DIRECTORY_SEPARATOR.$filename : $path;
    }

    private function storeFile(Request $request, string $folder): array
    {
        $file = $request->file('file');
        $filename = Str::random(30).'.'.$file->getClientOriginalExtension();
        $file->move($this->uploadPath($folder), $filename);

        return [
            'file_path' => $filename,
            'file_name' => $file->getClientOriginalName(),
        ];
    }

    private function deleteFile(string $folder, ?string $filename): void
    {
        if ($filename && file_exists($this->uploadPath($folder, $filename))) {
            unlink($this->uploadPath($folder, $filename));
        }
    }
}
