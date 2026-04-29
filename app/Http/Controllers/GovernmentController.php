<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GovernmentOfficial;
use Str;

class GovernmentController extends Controller
{
    public function indexofficials()
    {
        $officials = GovernmentOfficial::orderBy('sort_order', 'asc')->get();
        return view('admin.government.officials.index', compact('officials'));
    }

    public function addofficial(Request $request)
    {
        if ($request->isMethod('post')) {
            $record = new GovernmentOfficial;
            $record->name = $request->name;
            $record->position = $request->position;
            $record->office = $request->office;
            $record->bio = $request->bio;
            $record->contact = $request->contact;
            $record->sort_order = $request->sort_order ?? 0;
            $record->active = $request->has('active') ? 1 : 0;

            if (!empty($request->file('photo'))) {
                $file = $request->file('photo');
                $filename = Str::random(30) . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/', $filename);
                $record->photo = $filename;
            }

            $record->save();
            return redirect('admin/government/officials')->with('success', 'Official added successfully.');
        }
        return view('admin.government.officials.add');
    }

    public function editofficial($id, Request $request)
    {
        $official = GovernmentOfficial::findOrFail($id);
        if ($request->isMethod('post')) {
            $official->name = $request->name;
            $official->position = $request->position;
            $official->office = $request->office;
            $official->bio = $request->bio;
            $official->contact = $request->contact;
            $official->sort_order = $request->sort_order ?? 0;
            $official->active = $request->has('active') ? 1 : 0;

            if (!empty($request->file('photo'))) {
                if (!empty($official->photo) && file_exists('uploads/' . $official->photo)) {
                    unlink('uploads/' . $official->photo);
                }
                $file = $request->file('photo');
                $filename = Str::random(30) . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/', $filename);
                $official->photo = $filename;
            }

            $official->save();
            return redirect('admin/government/officials')->with('success', 'Official updated successfully.');
        }
        return view('admin.government.officials.edit', compact('official'));
    }

    public function deleteofficial($id)
    {
        $official = GovernmentOfficial::findOrFail($id);
        if (!empty($official->photo) && file_exists('uploads/' . $official->photo)) {
            unlink('uploads/' . $official->photo);
        }
        $official->delete();
        return redirect()->back()->with('success', 'Official deleted successfully.');
    }
}
