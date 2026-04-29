<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsandUpdates_news;
use App\Models\NewsandUpdates_upcomingupdates;
use Str;

class NewsandUpdatesController extends Controller
{
    private function uploadPath(?string $filename = null): string
    {
        $path = public_path('uploads');

        if (!is_dir($path)) {
            mkdir($path, 0755, true);
        }

        if (!is_writable($path)) {
            @chmod($path, 0775);
        }

        return $filename ? $path.DIRECTORY_SEPARATOR.$filename : $path;
    }

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
        $data = NewsandUpdates_news::findOrFail($id);
        return view('admin.newsandupdates.news.edit', [
                'news' => $data
        ]);
    }

    public function shownews($id)
    {
        $news = NewsandUpdates_news::findOrFail($id);

        return view('admin.newsandupdates.news.show', [
                'news' => $news
        ]);
    }

    public function updatenews($id, Request $request)
    {
        // dd($request->all());
        $updateRecord =  NewsandUpdates_news::find($id);
        $updateRecord->title = $request->title;
        $updateRecord->author = $request->author ?: 'Bontoc LGU';
        $updateRecord->category = $request->category ?: 'Municipal News';

        if(!empty($request->file('image_file'))){

            if (!empty($updateRecord->image_file) && file_exists($this->uploadPath($updateRecord->image_file))) {
                unlink($this->uploadPath($updateRecord->image_file));
            }

            $file = $request->file('image_file');
            $randomStr = Str::random(30);
            $filename = $randomStr . '.' . $file->
                    getClientOriginalExtension();
            $file->move($this->uploadPath(), $filename);
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
        $insertRecord->author           = $request->author ?: 'Bontoc LGU';
        $insertRecord->category         = $request->category ?: 'Municipal News';
    	$insertRecord->description 		= $request->description;
    	$insertRecord->status 			= $request->status;
    	$insertRecord->date_posted 		= $request->date_posted;

        if(! empty($request->file('image_file'))){
            $file = $request->file('image_file');
            $randomStr = Str::random(30);
            $filename = $randomStr . '.' . $file->
                    getClientOriginalExtension();
            $file->move($this->uploadPath(), $filename);
            $insertRecord->image_file = $filename;

        }

        $insertRecord->save();

        return redirect('admin/newsandupdates/news/list')->with('success', 'News successfully uploaded to news feature.');
    }

    public function deletenews($id, Request $request) 
    {
        $deleteRecord = NewsandUpdates_news::find($id);

        if (!empty($deleteRecord->image_file) && file_exists($this->uploadPath($deleteRecord->image_file))) {
            unlink($this->uploadPath($deleteRecord->image_file));
        }

        $deleteRecord->delete();

        return redirect()->back()->with('error', 'News successfully deleted.');
    }

    // Announcements

    public function addupcomingupdates(Request $request) 
    {
        $data = NewsandUpdates_upcomingupdates::all();
        return view('admin.newsandupdates.upcomingupdates.add', $data);
    }

    public function listupcomingupdates() 
    {   
        $data = NewsandUpdates_upcomingupdates::paginate(10);
        return view('admin.newsandupdates.upcomingupdates.list', [
                'upcomingupdates' => $data
        ]);
    }

    public function editupcomingupdates($id, Request $request) 
    {   
        // echo $id; die();
        $data = NewsandUpdates_upcomingupdates::findOrFail($id);
        return view('admin.newsandupdates.upcomingupdates.edit', [
                'upcomingupdates' => $data
        ]);
    }

    public function showupcomingupdates($id)
    {
        $upcomingupdates = NewsandUpdates_upcomingupdates::findOrFail($id);

        return view('admin.newsandupdates.upcomingupdates.show', [
                'upcomingupdates' => $upcomingupdates
        ]);
    }

    public function updateupcomingupdates($id, Request $request)
    {
        // dd($request->all());
        $updateRecord =  NewsandUpdates_upcomingupdates::find($id);
        $updateRecord->title = $request->title;
        $updateRecord->author = $request->author ?: 'Bontoc LGU';
        $updateRecord->category = $request->category ?: 'Announcement';

        if(!empty($request->file('image_file'))){

            if (!empty($updateRecord->image_file) && file_exists($this->uploadPath($updateRecord->image_file))) {
                unlink($this->uploadPath($updateRecord->image_file));
            }

            $file = $request->file('image_file');
            $randomStr = Str::random(30);
            $filename = $randomStr . '.' . $file->
                    getClientOriginalExtension();
            $file->move($this->uploadPath(), $filename);
            $updateRecord->image_file = $filename;

        }

        $updateRecord->description      = $request->description;
        $updateRecord->status           = $request->status;
        $updateRecord->date_posted      = $request->date_posted;
        $updateRecord->save();

        return redirect('admin/newsandupdates/upcomingupdates/list')->with('success', 'Announcement successfully updated.');
    }

    public function insertupcomingupdates(Request $request) 
    {
        // dd($request->all());
        $insertRecord                   = new NewsandUpdates_upcomingupdates;
        $insertRecord->id               = $request->id;
        $insertRecord->title            = $request->title;
        $insertRecord->author           = $request->author ?: 'Bontoc LGU';
        $insertRecord->category         = $request->category ?: 'Announcement';
        $insertRecord->description      = $request->description;
        $insertRecord->status           = $request->status;
        $insertRecord->date_posted      = $request->date_posted;

        if(! empty($request->file('image_file'))){
            $file = $request->file('image_file');
            $randomStr = Str::random(30);
            $filename = $randomStr . '.' . $file->
                    getClientOriginalExtension();
            $file->move($this->uploadPath(), $filename);
            $insertRecord->image_file = $filename;

        }

        $insertRecord->save();

        return redirect('admin/newsandupdates/upcomingupdates/list')->with('success', 'Announcement successfully uploaded.');
    }

    public function deleteupcomingupdates($id, Request $request) 
    {
        $deleteRecord = NewsandUpdates_upcomingupdates::find($id);

        if (!empty($deleteRecord->image_file) && file_exists($this->uploadPath($deleteRecord->image_file))) {
            unlink($this->uploadPath($deleteRecord->image_file));
        }

        $deleteRecord->delete();

        return redirect()->back()->with('error', 'Announcement successfully deleted.');
    }
}

?>
