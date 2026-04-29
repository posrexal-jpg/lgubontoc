<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::orderBy('date_posted', 'desc')->paginate(10);
        return view('admin.announcements.index', compact('announcements'));
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $record = new Announcement;
            $record->title = $request->title;
            $record->content = $request->content;
            $record->type = $request->type;
            $record->date_posted = $request->date_posted;
            $record->status = $request->status ?? 'active';
            $record->save();
            return redirect('admin/announcements')->with('success', 'Announcement added successfully.');
        }
        return view('admin.announcements.add');
    }

    public function edit($id, Request $request)
    {
        $announcement = Announcement::findOrFail($id);
        if ($request->isMethod('post')) {
            $announcement->title = $request->title;
            $announcement->content = $request->content;
            $announcement->type = $request->type;
            $announcement->date_posted = $request->date_posted;
            $announcement->status = $request->status ?? 'active';
            $announcement->save();
            return redirect('admin/announcements')->with('success', 'Announcement updated successfully.');
        }
        return view('admin.announcements.edit', compact('announcement'));
    }

    public function delete($id)
    {
        Announcement::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Announcement deleted successfully.');
    }
}
