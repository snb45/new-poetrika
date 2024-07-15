<?php

namespace App\Http\Controllers;

use App\models\Social;
use Illuminate\Http\Request;

class socialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function social(){

        $socials = Social::all();
        $counter = 1;
        return view('admin.social',compact('socials','counter'));

    }

    public function saveSocial(Request $request){

        $this->validate($request,[

            'name'  => 'required|unique:socials',
            'link'  => 'required',

        ]);

        $social = new Social();

        $social->name = ucwords($request->name);
        $social->link = $request->link;
        $social->save();

        return back()->with('success',' Saved');
    }


    public function deleteSocial($id){

        Social::find($id)->delete();

        return back()->with('success',' Delete');
    }
}
