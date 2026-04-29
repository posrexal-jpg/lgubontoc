<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aboutus_history;
use App\Models\Aboutus_location;
use App\Models\Aboutus_missionandvision;
use App\Models\Aboutus_municipalityseal;
use App\Models\Aboutus_servicepledge;
use App\Models\Aboutus_mandate;
use App\Models\Aboutus_directory;

class AboutusController extends Controller
{
    private function routes(string $name): array
    {
        return [
            'index' => "admin.aboutus.$name",
            'save' => "admin.aboutus.$name.add",
            'show' => "admin.aboutus.$name.show",
            'edit' => "admin.aboutus.$name.edit",
            'delete' => "admin.aboutus.$name.delete",
        ];
    }

    public function indexhistory() 
    {
        return $this->browseSimpleContent(Aboutus_history::class, 'History', $this->routes('history'));
    }
    
    public function addhistory(Request $request) 
    {
        return $this->saveSimpleContent($request, Aboutus_history::class, 'admin.aboutus.history');
    }
    public function showhistory($id) { return $this->readSimpleContent(Aboutus_history::class, 'History', $this->routes('history'), $id); }
    public function edithistory($id) { return $this->browseSimpleContent(Aboutus_history::class, 'History', $this->routes('history'), Aboutus_history::findOrFail($id)); }
    public function deletehistory($id) { return $this->deleteSimpleContent(Aboutus_history::class, 'admin.aboutus.history', $id); }

    public function indexlocation() 
    {
       return $this->browseSimpleContent(Aboutus_location::class, 'Location', $this->routes('location'));
    }

    public function addlocation(Request $request) 
    {
        return $this->saveSimpleContent($request, Aboutus_location::class, 'admin.aboutus.location');
    }
    public function showlocation($id) { return $this->readSimpleContent(Aboutus_location::class, 'Location', $this->routes('location'), $id); }
    public function editlocation($id) { return $this->browseSimpleContent(Aboutus_location::class, 'Location', $this->routes('location'), Aboutus_location::findOrFail($id)); }
    public function deletelocation($id) { return $this->deleteSimpleContent(Aboutus_location::class, 'admin.aboutus.location', $id); }


    public function indexmissionandvision() 
    {
       return $this->browseSimpleContent(Aboutus_missionandvision::class, 'Mission and Vision', $this->routes('missionandvision'));
    }
    public function addmissionandvision(Request $request) 
    {
        return $this->saveSimpleContent($request, Aboutus_missionandvision::class, 'admin.aboutus.missionandvision');
    }
    public function showmissionandvision($id) { return $this->readSimpleContent(Aboutus_missionandvision::class, 'Mission and Vision', $this->routes('missionandvision'), $id); }
    public function editmissionandvision($id) { return $this->browseSimpleContent(Aboutus_missionandvision::class, 'Mission and Vision', $this->routes('missionandvision'), Aboutus_missionandvision::findOrFail($id)); }
    public function deletemissionandvision($id) { return $this->deleteSimpleContent(Aboutus_missionandvision::class, 'admin.aboutus.missionandvision', $id); }

    public function indexmunicipalityseal() 
    {
        return $this->browseSimpleContent(Aboutus_municipalityseal::class, 'Municipality Seal', $this->routes('municipalityseal'));
    }
    public function addmunicipalityseal(Request $request) 
    {
        return $this->saveSimpleContent($request, Aboutus_municipalityseal::class, 'admin.aboutus.municipalityseal');
    }
    public function showmunicipalityseal($id) { return $this->readSimpleContent(Aboutus_municipalityseal::class, 'Municipality Seal', $this->routes('municipalityseal'), $id); }
    public function editmunicipalityseal($id) { return $this->browseSimpleContent(Aboutus_municipalityseal::class, 'Municipality Seal', $this->routes('municipalityseal'), Aboutus_municipalityseal::findOrFail($id)); }
    public function deletemunicipalityseal($id) { return $this->deleteSimpleContent(Aboutus_municipalityseal::class, 'admin.aboutus.municipalityseal', $id); }


    public function indexservicepledge() 
    {
       return $this->browseSimpleContent(Aboutus_servicepledge::class, 'Service Pledge', $this->routes('servicepledge'));
    }
    public function addservicepledge(Request $request) 
    {
        return $this->saveSimpleContent($request, Aboutus_servicepledge::class, 'admin.aboutus.servicepledge');
    }
    public function showservicepledge($id) { return $this->readSimpleContent(Aboutus_servicepledge::class, 'Service Pledge', $this->routes('servicepledge'), $id); }
    public function editservicepledge($id) { return $this->browseSimpleContent(Aboutus_servicepledge::class, 'Service Pledge', $this->routes('servicepledge'), Aboutus_servicepledge::findOrFail($id)); }
    public function deleteservicepledge($id) { return $this->deleteSimpleContent(Aboutus_servicepledge::class, 'admin.aboutus.servicepledge', $id); }


    public function indexmandate() 
    {
       return $this->browseSimpleContent(Aboutus_mandate::class, 'Mandate', $this->routes('mandate'));
    }
    public function addmandate(Request $request) 
    {
        return $this->saveSimpleContent($request, Aboutus_mandate::class, 'admin.aboutus.mandate');
    }
    public function showmandate($id) { return $this->readSimpleContent(Aboutus_mandate::class, 'Mandate', $this->routes('mandate'), $id); }
    public function editmandate($id) { return $this->browseSimpleContent(Aboutus_mandate::class, 'Mandate', $this->routes('mandate'), Aboutus_mandate::findOrFail($id)); }
    public function deletemandate($id) { return $this->deleteSimpleContent(Aboutus_mandate::class, 'admin.aboutus.mandate', $id); }

    public function indexdirectory() 
    {
        return $this->browseSimpleContent(Aboutus_directory::class, 'Directory', $this->routes('directory'));
    }
    public function adddirectory(Request $request) 
    {
        return $this->saveSimpleContent($request, Aboutus_directory::class, 'admin.aboutus.directory');
    }
    public function showdirectory($id) { return $this->readSimpleContent(Aboutus_directory::class, 'Directory', $this->routes('directory'), $id); }
    public function editdirectory($id) { return $this->browseSimpleContent(Aboutus_directory::class, 'Directory', $this->routes('directory'), Aboutus_directory::findOrFail($id)); }
    public function deletedirectory($id) { return $this->deleteSimpleContent(Aboutus_directory::class, 'admin.aboutus.directory', $id); }

}
