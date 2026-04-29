<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BudgetDocument;
use Str;

class BudgetController extends Controller
{
    public function index()
    {
        $documents = BudgetDocument::orderBy('year', 'desc')->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.transparency.budget.index', compact('documents'));
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $record = new BudgetDocument;
            $record->title = $request->title;
            $record->year = $request->year;
            $record->category = $request->category;
            $record->description = $request->description;
            $record->active = $request->has('active') ? 1 : 0;

            if (!empty($request->file('document_file'))) {
                $file = $request->file('document_file');
                $filename = Str::random(30) . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/budget/', $filename);
                $record->file_path = 'uploads/budget/' . $filename;
            }

            $record->save();
            return redirect('admin/transparency/budget')->with('success', 'Document added successfully.');
        }
        return view('admin.transparency.budget.add');
    }

    public function edit($id, Request $request)
    {
        $document = BudgetDocument::findOrFail($id);
        if ($request->isMethod('post')) {
            $document->title = $request->title;
            $document->year = $request->year;
            $document->category = $request->category;
            $document->description = $request->description;
            $document->active = $request->has('active') ? 1 : 0;

            if (!empty($request->file('document_file'))) {
                if (!empty($document->file_path) && file_exists($document->file_path)) {
                    unlink($document->file_path);
                }
                $file = $request->file('document_file');
                $filename = Str::random(30) . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/budget/', $filename);
                $document->file_path = 'uploads/budget/' . $filename;
            }

            $document->save();
            return redirect('admin/transparency/budget')->with('success', 'Document updated successfully.');
        }
        return view('admin.transparency.budget.edit', compact('document'));
    }

    public function delete($id)
    {
        $document = BudgetDocument::findOrFail($id);
        if (!empty($document->file_path) && file_exists($document->file_path)) {
            unlink($document->file_path);
        }
        $document->delete();
        return redirect()->back()->with('success', 'Document deleted successfully.');
    }
}
