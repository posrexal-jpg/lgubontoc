<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barangay;
use Str;

class BarangayController extends Controller
{
    public function index()
    {
        $barangays = Barangay::orderBy('name', 'asc')->get();
        return view('admin.barangays.index', compact('barangays'));
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $record = new Barangay;
            $record->name = $request->name;
            $record->captain = $request->captain;
            $record->area = $request->area;
            $record->population = $request->population;
            $record->description = $request->description;
            $record->active = $request->has('active') ? 1 : 0;

            if (!empty($request->file('photo'))) {
                $file = $request->file('photo');
                $filename = Str::random(30) . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/', $filename);
                $record->photo = $filename;
            }

            $record->save();
            return redirect('admin/barangays')->with('success', 'Barangay added successfully.');
        }
        return view('admin.barangays.add');
    }

    public function edit($id, Request $request)
    {
        $barangay = Barangay::findOrFail($id);
        if ($request->isMethod('post')) {
            $barangay->name = $request->name;
            $barangay->captain = $request->captain;
            $barangay->area = $request->area;
            $barangay->population = $request->population;
            $barangay->description = $request->description;
            $barangay->active = $request->has('active') ? 1 : 0;

            if (!empty($request->file('photo'))) {
                if (!empty($barangay->photo) && file_exists('uploads/' . $barangay->photo)) {
                    unlink('uploads/' . $barangay->photo);
                }
                $file = $request->file('photo');
                $filename = Str::random(30) . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/', $filename);
                $barangay->photo = $filename;
            }

            $barangay->save();
            return redirect('admin/barangays')->with('success', 'Barangay updated successfully.');
        }
        return view('admin.barangays.edit', compact('barangay'));
    }

    public function delete($id)
    {
        $barangay = Barangay::findOrFail($id);
        if (!empty($barangay->photo) && file_exists('uploads/' . $barangay->photo)) {
            unlink('uploads/' . $barangay->photo);
        }
        $barangay->delete();
        return redirect()->back()->with('success', 'Barangay deleted successfully.');
    }
}
