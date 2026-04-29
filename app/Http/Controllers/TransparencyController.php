<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transparency_municipalordinance;
use App\Models\Transparency_resolution;

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
        return $this->browseSimpleContent(Transparency_municipalordinance::class, 'Municipal Ordinances', $this->routes('municipalordinances'));
    }

   public function addmunicipalordinances(Request $request) 
    {
        return $this->saveSimpleContent($request, Transparency_municipalordinance::class, 'admin.transparency.municipalordinances');
    }
    public function showmunicipalordinances($id) { return $this->readSimpleContent(Transparency_municipalordinance::class, 'Municipal Ordinances', $this->routes('municipalordinances'), $id); }
    public function editmunicipalordinances($id) { return $this->browseSimpleContent(Transparency_municipalordinance::class, 'Municipal Ordinances', $this->routes('municipalordinances'), Transparency_municipalordinance::findOrFail($id)); }
    public function deletemunicipalordinances($id) { return $this->deleteSimpleContent(Transparency_municipalordinance::class, 'admin.transparency.municipalordinances', $id); }

    public function indexresolutions() 
    {
        return $this->browseSimpleContent(Transparency_resolution::class, 'Resolutions', $this->routes('resolutions'));
    }

   public function addresolutions(Request $request) 
    {
        return $this->saveSimpleContent($request, Transparency_resolution::class, 'admin.transparency.resolutions');
    }
    public function showresolutions($id) { return $this->readSimpleContent(Transparency_resolution::class, 'Resolutions', $this->routes('resolutions'), $id); }
    public function editresolutions($id) { return $this->browseSimpleContent(Transparency_resolution::class, 'Resolutions', $this->routes('resolutions'), Transparency_resolution::findOrFail($id)); }
    public function deleteresolutions($id) { return $this->deleteSimpleContent(Transparency_resolution::class, 'admin.transparency.resolutions', $id); }
}
