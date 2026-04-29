<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsandUpdates_news;
use App\Models\NewsandUpdates_upcomingupdates;
use Str;

class NewsandUpdatesController extends Controller
{

	public function addnews(Request $request) 
    {
        $data = NewsandUpdates_news::all();
        return view('admin.newsandupdates.news.add', $data);
    }

    public function listnews() 
    {   
        $data = NewsandUpdates_news::paginate(10);
        return view('admin.newsandupdates.news.list', [
                'news' => $data
        ]);
    }

    public function editnews($id, Request $request) 
    {   
        // echo $id; die();
        $data = NewsandUpdates_news::find($id);
        return view('admin.newsandupdates.news.edit', [
                'news' => $data
        ]);
    }

    public function updatenews($id, Request $request)
    {
        // dd($request->all());
        $updateRecord =  NewsandUpdates_news::find($id);
        $updateRecord->title = $request->title;

        if(!empty($request->file('image_file'))){

            if (!empty($updateRecord->image) && file_exists('uploads/'.$updateRecord->image)) {
                unlink('uploads/'.$updateRecord->image);
            }

            $file = $request->file('image_file');
            $randomStr = Str::random(30);
            $filename = $randomStr . '.' . $file->
                    getClientOriginalExtension();
            $file->move('uploads/',$filename);
            $updateRecord->image_file = $filename;

        }

        $updateRecord->description      = $request->description;
        $updateRecord->status           = $request->status;
        $updateRecord->date_posted      = $request->date_posted;
        $updateRecord->save();

        return redirect('admin/newsandupdates/news/list')->with('success', 'News feature successfully updated.');
    }

    public function insertnews(Request $request) 
    {
        // dd($request->all());
        $insertRecord                   = new NewsandUpdates_news;
    	$insertRecord->id 			    = $request->id;
    	$insertRecord->title 			= $request->title;
    	$insertRecord->description 		= $request->description;
    	$insertRecord->status 			= $request->status;
    	$insertRecord->date_posted 		= $request->date_posted;

        if(! empty($request->file('image_file'))){
            $file = $request->file('image_file');
            $randomStr = Str::random(30);
            $filename = $randomStr . '.' . $file->
                    getClientOriginalExtension();
            $file->move('uploads/',$filename);
            $insertRecord->image_file = $filename;

        }

        $insertRecord->save();

        return redirect('admin/newsandupdates/news/list')->with('success', 'News successfully uploaded to news feature.');
    }

    public function deletenews($id, Request $request) 
    {
        $deleteRecord = NewsandUpdates_news::find($id);

        if (!empty($deleteRecord->image) && file_exists('uploads/'.$deleteRecord->image)) {
            unlink('public/uploads/'.$deleteRecord->image);
        }

        $deleteRecord->delete();

        return redirect()->back()->with('error', 'News successfully deleted.');
    }

    // Upcoming Updates

    public function addupcomingupdates(Request $request) 
    {
        $data = NewsandUpdates_upcomingupdates::all();
        return view('admin.newsandupdates.upcomingupdates.add', $data);
    }

    public function listupcomingupdates() 
    {   
        $data = NewsandUpdates_news::paginate(10);
        return view('admin.newsandupdates.upcomingupdates.list', [
                'upcomingupdates' => $data
        ]);
    }

    public function editupcomingupdates($id, Request $request) 
    {   
        // echo $id; die();
        $data = NewsandUpdates_upcomingupdates::find($id);
        return view('admin.newsandupdates.upcomingupdates.edit', [
                'upcomingupdates' => $data
        ]);
    }

    public function updateupcomingupdates($id, Request $request)
    {
        // dd($request->all());
        $updateRecord =  NewsandUpdates_upcomingupdates::find($id);
        $updateRecord->title = $request->title;

        if(!empty($request->file('image_file'))){

            if (!empty($updateRecord->image) && file_exists('uploads/'.$updateRecord->image)) {
                unlink('public/uploads/'.$updateRecord->image);
            }

            $file = $request->file('image_file');
            $randomStr = Str::random(30);
            $filename = $randomStr . '.' . $file->
                    getClientOriginalExtension();
            $file->move('public/uploads/',$filename);
            $updateRecord->image_file = $filename;

        }

        $updateRecord->description      = $request->description;
        $updateRecord->status           = $request->status;
        $updateRecord->date_posted      = $request->date_posted;
        $updateRecord->save();

        return redirect('admin/newsandupdates/upcomingupdates/list')->with('success', 'Upcoming Updates feature successfully updated.');
    }

    public function insertupcomingupdates(Request $request) 
    {
        // dd($request->all());
        $insertRecord                   = new NewsandUpdates_upcomingupdates;
        $insertRecord->id               = $request->id;
        $insertRecord->title            = $request->title;
        $insertRecord->description      = $request->description;
        $insertRecord->status           = $request->status;
        $insertRecord->date_posted      = $request->date_posted;

        if(! empty($request->file('image_file'))){
            $file = $request->file('image_file');
            $randomStr = Str::random(30);
            $filename = $randomStr . '.' . $file->
                    getClientOriginalExtension();
            $file->move('public/uploads/',$filename);
            $insertRecord->image_file = $filename;

        }

        $insertRecord->save();

        return redirect('admin/newsandupdates/upcomingupdates/list')->with('success', 'Successfully uploaded to upcomingupdates feature.');
    }

    public function deleteupcomingupdates($id, Request $request) 
    {
        $deleteRecord = NewsandUpdates_upcomingupdates::find($id);

        if (!empty($deleteRecord->image) && file_exists('uploads/'.$deleteRecord->image)) {
            unlink('public/uploads/'.$deleteRecord->image);
        }

        $deleteRecord->delete();

        return redirect()->back()->with('error', 'Upcoming Updates successfully deleted.');
    }
}

?>