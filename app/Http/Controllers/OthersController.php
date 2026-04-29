<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Others_downloadableforms;
use App\Models\Others_gallery;
use App\Models\Others_memorandom;

class OthersController extends Controller
{
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
        return $this->browseSimpleContent(Others_downloadableforms::class, 'Downloadable Forms', $this->routes('downloadableforms'));
    }

   public function adddownloadableforms(Request $request) 
    {
        return $this->saveSimpleContent($request, Others_downloadableforms::class, 'admin.others.downloadableforms');
    }
    public function showdownloadableforms($id) { return $this->readSimpleContent(Others_downloadableforms::class, 'Downloadable Forms', $this->routes('downloadableforms'), $id); }
    public function editdownloadableforms($id) { return $this->browseSimpleContent(Others_downloadableforms::class, 'Downloadable Forms', $this->routes('downloadableforms'), Others_downloadableforms::findOrFail($id)); }
    public function deletedownloadableforms($id) { return $this->deleteSimpleContent(Others_downloadableforms::class, 'admin.others.downloadableforms', $id); }

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
