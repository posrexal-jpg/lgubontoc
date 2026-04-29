<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Careers_jobvacancies;

class CareersController extends Controller
{
   public function indexjobvacancies() 
    {
        $jobvacancies = Careers_jobvacancies::all();
        return view('admin.careers.jobvacancies.index',[
                'jobvacancies' => $jobvacancies,
                'jobvacancy' => null,
        ]);
    }

   public function editjobvacancies($id)
    {
        $jobvacancies = Careers_jobvacancies::all();
        $jobvacancy = Careers_jobvacancies::findOrFail($id);

        return view('admin.careers.jobvacancies.index',[
                'jobvacancies' => $jobvacancies,
                'jobvacancy' => $jobvacancy,
        ]);
    }

   public function showjobvacancies($id)
    {
        $jobvacancy = Careers_jobvacancies::findOrFail($id);

        return view('admin.careers.jobvacancies.show',[
                'jobvacancy' => $jobvacancy,
        ]);
    }

   public function addjobvacancies(Request $request) 
    {
        if ($request->id) {
            $update = Careers_jobvacancies::find($request->id);
            $update->title = $request->title;
            $update->description = $request->description;
            $update->save();
        } else {
            $formsave = new Careers_jobvacancies();
            $formsave->title = $request->title;
            $formsave->description = $request->description;
            $formsave->save();
         }
        return redirect()->route('admin.careers.jobvacancies')->with('success', 'Job vacancy successfully saved.');
    }

   public function deletejobvacancies($id)
    {
        Careers_jobvacancies::findOrFail($id)->delete();

        return redirect()->route('admin.careers.jobvacancies')->with('error', 'Job vacancy successfully deleted.');
    }
}
