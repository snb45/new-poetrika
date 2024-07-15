<?php

namespace App\Http\Controllers;

use App\Helpers\ImageAlgo;
use App\models\Card;
use App\models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class cardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function manageCards()
    {
        $user = Auth::id();

        $cards = Card::where('userId',$user)->get();

        $categories = Category::all();

        return view('admin.manageCards',compact('cards','categories'));
    }

    public function saveCard(Request $request){

        $this->validate($request,[

            'file'          => 'mimes:png,jpeg,jpg',
            'category'    => 'required',
        ]);

        if ($request->hasfile('file')) {

            $card =  new Card();

            $card->userId       = Auth::id();
            $card->category     = $request->category;
            $card->userId       = Auth::id();
            $card->save();

            $image         = $request->file('file');
            $resizedImage  = ImageAlgo::MediaRandor($image);
            $card->addMediaFromString((string)$resizedImage)->usingName(strtolower(Str::slug("cards")))->toMediaCollection();

            return redirect(route('manageCards'))->with('success',' Card saved!');

        }else{

            return redirect()->back()->with('error',' Something went wrong!');
        }
    }

    public function deleteCard($id){

        Card::find($id)->delete();

        return redirect()->back()->with('success',' Card has been deleted!');

    }
}
