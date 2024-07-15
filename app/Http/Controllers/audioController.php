<?php

namespace App\Http\Controllers;

use App\models\Audio;
use App\models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class audioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function audio(){

        $audios     = Audio::select('audio.*','categories.name as categoryName')
            ->join('categories','categories.id','=','audio.category')
            ->where('userId',Auth::id())
            ->orderBy('audio.id','DESC')
            ->get();

        $categories = Category::all();

        return view('admin.audio',compact('audios','categories'));
    }

    public function editAudio($id){

        $audio     = Audio::select('*')
            ->where('id',$id)
            ->first();

        $categories = Category::all();

        return view('admin.editAudio',compact('audio','categories'));
    }

    public function updateAudio(Request $request, $id)
    {
        $this->validate($request, [
            'audioFile' => 'sometimes|mimes:mp3',
            'displayImage' => 'sometimes|image',
        ]);

        $audio      = Audio::findOrFail($id);

        $category   = $request->category === "Select" ? $audio->category : $request->category;

        if ($request->hasFile('audioFile')) {

            $filePath   = public_path('audios') .'/'.$audio->audioFile;

            if (File::exists($filePath)) {
                File::delete($filePath);
            }

            $file           = $request->file('audioFile');
            $destination    = public_path('audios');
            $extension      = $file->getClientOriginalExtension();
            $fileName       = md5(Carbon::now() . $file->getClientOriginalName()) . '.' . $extension;
            $file->move($destination, $fileName);
            $audio->audioFile = $fileName;
        }

        $audio->title           = $request->title;
        $audio->category        = $category;
        $audio->descriptions    = $request->about;
        $audio->save();

        if ($request->hasFile('displayImage')) {
            $image = $request->file('displayImage');
            $audio->addMedia($image)->usingName(Str::slug($audio->slug))->toMediaCollection();
        }

        return redirect()->route('audio');
    }


    public function saveAudio(Request $request){

        $this->validate($request,[

            'audioFile'     => 'required|mimes:mp3',
            'displayImage'  => 'required|mimes:png,jpeg,jpg,webp',

        ]);

        if ($request->hasfile('audioFile')) {

            $audio =  new Audio();

            $file           =   $request->file('audioFile');
            $destination    =   public_path('audios');
            $extension      =   $file->getClientOriginalExtension();
            $files          =   md5(Carbon::now().$file->getClientOriginalName());
            $fileName       =   $files.'.'.$extension;
            $file->move($destination, $fileName);


            $audio->audioFile      = $fileName;
            $audio->title          = $request->title;
            $audio->category       = $request->category;
            $audio->descriptions   = $request->about;
            $audio->status         = 0;
            $audio->userId         = Auth::id();
            $audio->save();

            if ($request->hasfile('displayImage')){
                $image                 = $request->file('displayImage');
                $audio->addMedia($image)->usingName(Str::slug($audio->slug))->toMediaCollection();
            }

            return redirect(route('audio'));

        }else{

            return redirect()->back();
        }
    }

    public function approveAudio($id){

        $audio          = Audio::find($id);
        $audio->status  = 1;
        $audio->save();

        return redirect()->back()->with('success',' Poet Approved');
    }

    public function disApproveAudio ($id){

        $audio          = Audio::find($id);
        $audio->status  = 0;
        $audio->save();

        return redirect()->back()->with('success',' Poet Dis Approved');
    }
}
