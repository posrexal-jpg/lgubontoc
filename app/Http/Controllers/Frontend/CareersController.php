<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Careers_jobvacancies;

class CareersController extends Controller
{
    public function indexjobvacancies()
    {
        $careers = Careers_jobvacancies::latest()->get();
        return view('frontend.careers.jobvacancies.index',[
                'careers' => $careers
        ]);
    }

    public function showjobvacancies($id)
    {
        $career = Careers_jobvacancies::findOrFail($id);

        return view('frontend.careers.jobvacancies.show', [
            'career' => $career,
        ]);
    }
    
}
