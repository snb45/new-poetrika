<?php

namespace App\Http\Controllers;

use App\Helpers\ImageAlgo;
use App\Helpers\youtubeHelper;
use App\models\Category;
use File;
use App\models\video;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class videoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function video(){

        $videos     = video::select('videos.*','categories.name as categoryName')
            ->join('categories','categories.id','=','videos.category')
            ->where([['userId',Auth::id()]])
            ->orderBy('videos.id','DESC')
            ->get();

        $categories = Category::all();

        return view('admin.video',compact('videos','categories'));
    }

    public function saveVideo(Request $request){

        $this->validate($request,[

            'title'          => 'required',
            'youtubeLink'    => 'required',
            'category'       => 'required',
        ]);

        $video =  new video();

        $videoId               = youtubeHelper::extractVideoId($request->youtubeLink);
        $video->videoFile      = $videoId;
        $video->slug           = strtolower(Str::slug($request->title));
        $video->title          = strtolower(Str::slug($request->title));
        $video->category       = $request->category;
        $video->descriptions   = $request->about;
        $video->status         = 0;
        $video->userId         = Auth::id();
        $video->save();

        $image                 = $request->file('banner');
        $video->addMedia($image)->usingName($video->slug)->toMediaCollection();

        return redirect(route('video'));
    }

    public function approveVideo($id){

        $video      = video::find($id);

        $video->status = 1;
        $video->save();

        return redirect()->back()->with('success',' Poet Approved');
    }

    public function disApproveVideo($id){

        $video          = video::find($id);

        $video->status  = 0;
        $video->save();

        return redirect()->back()->with('success',' Poet Dis Approved');
    }


}
