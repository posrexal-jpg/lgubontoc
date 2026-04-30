<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Str;

use App\Models\HomepageHeroSetting;
use App\Models\HomepageModel;


class HomepageController extends Controller
{
    public function home()
    {
        $data['getrecord'] = HomepageModel::get();
        $data['heroSetting'] = HomepageHeroSetting::firstOrCreate([], HomepageHeroSetting::defaults());
    	return view('admin.home.list', $data);
    }

    public function updateHero(Request $request)
    {
        $data = $request->validate([
            'eyebrow' => ['nullable', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'primary_button_label' => ['nullable', 'string', 'max:255'],
            'primary_button_url' => ['nullable', 'string', 'max:255'],
            'secondary_button_label' => ['nullable', 'string', 'max:255'],
            'secondary_button_url' => ['nullable', 'string', 'max:255'],
            'fact_1_title' => ['nullable', 'string', 'max:255'],
            'fact_1_text' => ['nullable', 'string', 'max:255'],
            'fact_2_title' => ['nullable', 'string', 'max:255'],
            'fact_2_text' => ['nullable', 'string', 'max:255'],
            'fact_3_title' => ['nullable', 'string', 'max:255'],
            'fact_3_text' => ['nullable', 'string', 'max:255'],
        ]);

        HomepageHeroSetting::firstOrCreate([], HomepageHeroSetting::defaults())->update($data);

        return redirect()->route('admin.home')->with('success', 'Homepage hero content successfully updated.');
    }

    public function home_add(Request $request)
    {
    	return view('admin.home.add');
    }

    public function home_add_post(Request $request)
    {
        // dd($request->all());
    	$insertRecord =  new HomepageModel;

    	$insertRecord->title     = trim($request->title);
    	$insertRecord->date_posted     = trim($request->date_posted);
    	$insertRecord->description     = trim($request->description);

    	if(!empty($request->file('image'))){

    		$file                    = $request->file('image');
    		$randomStr               = Str::random(30);
    		$filename                = $randomStr .  '.' . $file->getClientOriginalExtension();
    		$file->move('public/home/',$filename);
    		$insertRecord->image   = $filename;
    	}

    	$insertRecord->save();

    	return redirect('admin/home')->with('success', "Home successfully save.");
    }

    public function home_show($id)
    {
        $data['getrecord'] = HomepageModel::findOrFail($id);
        return view('admin.home.show', $data);
    }

    public function home_edit($id, Request $request)
    {
        $data['getrecord'] = HomepageModel::findOrFail($id);
        return view('admin.home.edit', $data);
    }

    public function home_edit_post($id, Request $request)
    {
        // dd($request->all());
        $updateRecord = HomepageModel::find($id);
        $updateRecord->title = trim($request->title);
        $updateRecord->date_posted     = trim($request->date_posted);
        $updateRecord->description     = trim($request->description);

        if(!empty($request->file('image'))){

             if(!empty($updateRecord->image) && file_exists('public/home/'.$updateRecord->image)){
                unlink('public/home/'.$updateRecord->image);
             }


            $file                    = $request->file('image');
            $randomStr               = Str::random(30);
            $filename                = $randomStr .  '.' . $file->getClientOriginalExtension();
            $file->move('public/home/',$filename);
            $updateRecord->image   = $filename;
        }

        $updateRecord->save();

        return redirect('admin/home')->with('success', "Home successfully update.");

    }

    public function home_delete($id, Request $request)
    {
        // echo $id; die();
        $deleteRecord = HomepageModel::find($id);

        if(!empty($deleteRecord->image) && file_exists('public/home/'.$deleteRecord->image)){
                unlink('public/home/'.$deleteRecord->image);
            }

        $deleteRecord->delete();

        return redirect()->back()->with('error', "Record successfully deleted.");

    }
}
