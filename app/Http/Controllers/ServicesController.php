<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services_mayorsoffice;


class ServicesController extends Controller
{
    private function routes(string $name): array
    {
        return [
            'index' => "admin.services.$name",
            'save' => "admin.services.$name.add",
            'show' => "admin.services.$name.show",
            'edit' => "admin.services.$name.edit",
            'delete' => "admin.services.$name.delete",
        ];
    }

     public function indexmayorsoffice() 
    {
        return $this->browseSimpleContent(Services_mayorsoffice::class, "Mayor's Office", $this->routes('mayorsoffice'));
    }

   public function addmayorsoffice(Request $request) 
    {
        return $this->saveSimpleContent($request, Services_mayorsoffice::class, 'admin.services.mayorsoffice');
    }
    public function showmayorsoffice($id) { return $this->readSimpleContent(Services_mayorsoffice::class, "Mayor's Office", $this->routes('mayorsoffice'), $id); }
    public function editmayorsoffice($id) { return $this->browseSimpleContent(Services_mayorsoffice::class, "Mayor's Office", $this->routes('mayorsoffice'), Services_mayorsoffice::findOrFail($id)); }
    public function deletemayorsoffice($id) { return $this->deleteSimpleContent(Services_mayorsoffice::class, 'admin.services.mayorsoffice', $id); }
}
