<?php

namespace App\Http\Controllers;

use App\Helpers\ImageAlgo;
use App\models\Category;
use App\models\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class wordsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function words(){

        $words    = Word::select('words.*','categories.name as categoryName')
            ->join('categories','categories.id','=','words.category')
            ->where('userId',Auth::id())
            ->orderBy('words.id','DESC')
            ->get();

        $categories = Category::orderBy('name','asc')->get();

        return view('admin.words',compact('words','categories'));
    }

    public function editWords($id){

        $words    =  $words    = Word::select('words.*','categories.name as categoryName','categories.id as categoryId')
            ->join('categories','categories.id','=','words.category')
            ->where('words.id',$id)
            ->first();

        $categories = Category::all();

        return view('admin.editWords',compact('words','categories'));
    }

    public function saveWord(Request $request){

        $this->validate($request,[
            'title'         => 'required',
            'displayImage' => 'mimes:png,jpg,jpeg',
        ]);

        if ($request->hasfile('displayImage')) {

            $video          =  new Word();

            $video->title          = strtolower($request->title);
            $video->slug           = strtolower(Str::slug($request->title));
            $video->category       = $request->category;
            $video->poetry         = $request->poetry;
            $video->status         = 0;
            $video->userId         = Auth::id();
            $video->save();

            $image         = $request->file('displayImage');
            $resizedImage  = ImageAlgo::MediaRandor($image);
            $video->addMediaFromString((string)$resizedImage)->usingName(strtolower(Str::slug($request->title)))->toMediaCollection();

            return redirect(route('words'));

        }else{

            return redirect()->back();
        }
    }

    public function updateWord(Request $request,$id){

        $this->validate($request,[

            'displayImage'  => 'mimes:png,jpg,jpeg',
            'title'         => 'required',
            'category'      => 'required',
        ]);

        if ($request->hasfile('displayImage')) {

            $video =  Word::find($id);

            if ($request->category == "Select"){

                $category = $video->category;

            }else{

                $category = $request->category;
            }

            $video->title          = strtolower($request->title);
            $video->slug           = strtolower(Str::slug($request->title));
            $video->category       = $category;
            $video->poetry         = $request->poetry;
            $video->status         = 0;
            $video->selected       = 0;
            $video->save();

            $video->clearMediaCollection();

            $image         = $request->file('displayImage');
            $resizedImage  = ImageAlgo::MediaRandor($image);
            $video->addMediaFromString((string)$resizedImage)->usingName(strtolower(Str::slug($request->title)))->toMediaCollection();

            return redirect(route('words'));

        }else{

            $video                 =  Word::find($id);

            if ($request->category == "Select"){

                $category = $video->category;

            }else{

                $category = $request->category;
            }

            $video->title          = $request->title;
            $video->category       = $category;
            $video->poetry         = $request->poetry;
            $video->status         = 0;
            $video->selected       = 0;
            $video->save();

            return redirect(route('words'));

        }
    }

    public function approveWord($id){

        $Word      = Word::find($id);

        $Word->status = 1;
        $Word->save();

        return redirect()->back()->with('success',' Poet Approved');
    }

    public function disApproveWord($id){

        $Word          = Word::find($id);

        $Word->status  = 0;
        $Word->save();

        return redirect()->back()->with('success',' Poet Dis Approved');
    }

    public function deleteWord($id){

        Word::find($id)->delete();

        return redirect()->back()->with('success',' Poet Deleted');
    }
}
