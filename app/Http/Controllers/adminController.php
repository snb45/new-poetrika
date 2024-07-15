<?php

namespace App\Http\Controllers;

use App\Helpers\ImageAlgo;
use App\models\About;
use App\models\Audio;
use App\models\Book;
use App\models\Card;
use App\models\Category;
use App\models\User;
use App\models\video;
use App\models\Word;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\View\View;

class adminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $a = Audio::all()->count();
        $v = video::all()->count();
        $w = Word::all()->count();

        return view('admin.index',compact('a','v','w'));
    }

    public function accounts(){

        $users   = User::all();
        $counter = 1;

        return view('admin.accounts',compact('users','counter'));
    }

    public function notFoundPage(){

        return view('admin.404');
    }

    public function allWords(){

        $words = Word::all();

        return view('admin.allWords',compact('words'));

    }

    public function allAudio(){

        $audios = Audio::all();

        return view('admin.allAudio',compact('audios'));

    }

    public function allVideos(){

        $videos = video::all();

        return view('admin.allVideos',compact('videos'));

    }

    public function about(){

        $about = About::first();

        return view('admin.about',compact('about'));

    }

    public function saveAbout(Request $request){

        $this->validate($request,[

            'about'=>'required',
        ]);

        $about          = new About();
        $about->about   = $request->about;

        $about->save();

        return redirect(route('about'))->with('success', ' Saved');

    }

    public function updateAbout(Request $request,$id){

        $this->validate($request,[

            'about'=>'required',
        ]);

        $about          =  About::find($id);
        $about->about   = $request->about;

        $about->save();

        return redirect(route('about'))->with('success', ' Saved');

    }

    public function poetOfTheWeekWord($id){

        $findSelectedWord   = Word::where('selected',1)->first();
        $findSelectedVideo  = video::where('selected',1)->first();
        $findSelectedCard   = Card::where('selected',1)->first();
        $findSelectedAudio   = Audio::where('selected',1)->first();

        if ($findSelectedWord){
            $removeWord  = Word::find($findSelectedWord->id);
            $removeWord->selected   = 0;
            $removeWord->save();
        }

        if ($findSelectedVideo){
            $removeVideo = video::find($findSelectedVideo->id);
            $removeVideo->selected  = 0;
            $removeVideo->save();
        }


        if ($findSelectedAudio){
            $removeVideo = Audio::find($findSelectedAudio->id);
            $removeVideo->selected  = 0;
            $removeVideo->save();
        }


        if ($findSelectedCard){
            $removeVideo = Card::find($findSelectedCard->id);
            $removeVideo->selected  = 0;
            $removeVideo->save();
        }

        $Word      = Word::find($id);

        $Word->status   = 1;
        $Word->selected = 1;
        $Word->save();

        return redirect()->back()->with('success',' Poet Selected');
    }

    public function poetOfTheWeekVideo($id){

        $findSelectedWord   = Word::where('selected',1)->first();
        $findSelectedVideo  = video::where('selected',1)->first();
        $findSelectedCard   = Card::where('selected',1)->first();
        $findSelectedAudio   = Audio::where('selected',1)->first();

        if ($findSelectedWord){
            $removeWord  = Word::find($findSelectedWord->id);
            $removeWord->selected   = 0;
            $removeWord->save();
        }

        if ($findSelectedVideo){
            $removeVideo = video::find($findSelectedVideo->id);
            $removeVideo->selected  = 0;
            $removeVideo->save();
        }


        if ($findSelectedAudio){
            $removeVideo = Audio::find($findSelectedAudio->id);
            $removeVideo->selected  = 0;
            $removeVideo->save();
        }


        if ($findSelectedCard){
            $removeVideo = Card::find($findSelectedCard->id);
            $removeVideo->selected  = 0;
            $removeVideo->save();
        }

        $Word           = video::find($id);
        $Word->status   = 1;
        $Word->selected = 1;
        $Word->save();

        return redirect()->back()->with('success',' Poet Selected');
    }

    public function poetOfTheWeekAudio($id){

        $findSelectedWord   = Word::where('selected',1)->first();
        $findSelectedVideo  = video::where('selected',1)->first();
        $findSelectedCard   = Card::where('selected',1)->first();
        $findSelectedAudio   = Audio::where('selected',1)->first();

        if ($findSelectedWord){
            $removeWord  = Word::find($findSelectedWord->id);
            $removeWord->selected   = 0;
            $removeWord->save();
        }

        if ($findSelectedVideo){
            $removeVideo = video::find($findSelectedVideo->id);
            $removeVideo->selected  = 0;
            $removeVideo->save();
        }


        if ($findSelectedAudio){
            $removeVideo = Audio::find($findSelectedAudio->id);
            $removeVideo->selected  = 0;
            $removeVideo->save();
        }


        if ($findSelectedCard){
            $removeVideo = Card::find($findSelectedCard->id);
            $removeVideo->selected  = 0;
            $removeVideo->save();
        }

        $Word           = Audio::find($id);
        $Word->status   = 1;
        $Word->selected = 1;
        $Word->save();

        return redirect()->back()->with('success',' Poet Selected');
    }

    public function poetOfTheWeekCard($id){

        $findSelectedWord   = Word::where('selected',1)->first();
        $findSelectedVideo  = video::where('selected',1)->first();
        $findSelectedCard   = Card::where('selected',1)->first();
        $findSelectedAudio   = Audio::where('selected',1)->first();

        if ($findSelectedWord){
            $removeWord  = Word::find($findSelectedWord->id);
            $removeWord->selected   = 0;
            $removeWord->save();
        }

        if ($findSelectedVideo){
            $removeVideo = video::find($findSelectedVideo->id);
            $removeVideo->selected  = 0;
            $removeVideo->save();
        }


        if ($findSelectedAudio){
            $removeVideo = Audio::find($findSelectedAudio->id);
            $removeVideo->selected  = 0;
            $removeVideo->save();
        }


        if ($findSelectedCard){
            $removeVideo = Card::find($findSelectedCard->id);
            $removeVideo->selected  = 0;
            $removeVideo->save();
        }

        $Word           = Card::find($id);
        $Word->status   = 1;
        $Word->selected = 1;
        $Word->save();

        return redirect()->back()->with('success',' Poet Selected');
    }

    public function myAccount(){

        $account = User::find(Auth::id());
        $a       = Audio::all()->where('userId',Auth::id())->count();
        $v       = video::all()->where('userId',Auth::id())->count();
        $w       = Word::all()->where('userId',Auth::id())->count();

        return \view('admin.myAccount',compact('a','v','w','account'));
    }

    public function updateUser(Request $request,$id){


        if ($request->password === $request->confirmPassword){

            $account            = User::find($id);

            $account->name      = $request->name;
            $account->email     = $request->email;
            $account->phone     = $request->phone;
            $account->bio       = $request->bio;
            $account->password  = Hash::make($request->password);
            $account->save();

            if ($request->hasfile('photo')) {

                $this->validate($request, [

                    'photo' => 'mimes:png,jpg,jpeg|max:2000',
                ]);

                $account->clearMediaCollection();

                $image         = $request->file('photo');
                $resizedImage  = ImageAlgo::MediaRandor($image);
                $account->addMediaFromString((string)$resizedImage)->usingName(strtolower(Str::slug($account->name)))->toMediaCollection();

            }

            return redirect()->back()->with('success',' Updated');

        }else{

            return redirect()->back()->with('error',' Password do not match');

        }

    }

    public function myBooks(){

        $books  = Book::select('books.id','books.bookName','books.description','books.created_at','categories.name as categoryName')
            ->join('categories','categories.id','books.category')
            ->where('userId',Auth::id())
            ->get();

        $categories = Category::all();

        return view('admin.books',compact('books','categories'));
    }

    public function manageBooks(){

        $books      = Book::all();

        $categories = Category::all();

        return view('admin.books',compact('books','categories'));
    }

    public function saveBook(Request $request){


        $this->validate($request,[

            'coverImage'    => 'mimes:png,jpg,jpeg',
            'book'          => 'mimes:pdf',
            'category'      => 'required',
        ]);

        $book = new Book();

        $file          =   $request->file('book');
        $destination   =   public_path('/books');
        $extension     =   $file->getClientOriginalExtension();
        $files         =   md5($file->getClientOriginalName());
        $fileName      =   $files.'.'.$extension;
        $file->move($destination, $fileName);

        $book->bookName     = $request->title;
        $book->description  = $request->description;
        $book->userId       = Auth::id();
        $book->category     = $request->category;
        $book->link         = $fileName;
        $book->status       = 0 ;
        $book->save();

        $image         = $request->file('coverImage');
        $resizedImage  = ImageAlgo::MediaRandor($image);
        $book->addMediaFromString((string)$resizedImage)->usingName(strtolower(Str::slug($book->title)))->toMediaCollection();

        return redirect(route('manageBooks'))->with('success','Book Saved');

    }

    public function deleteBook($id){

        Book::find($id)->delete();

        return back()->with('success',' Book deleted');
    }

    public function approveBook($id){

        $book = Book::find($id);
        $book->status       = 1 ;
        $book->save();
        return back()->with('success',' Book approved');
    }

    public function disApproveBook($id){

        $book = Book::find($id);
        $book->status       = 0 ;
        $book->save();
        return back()->with('success',' Book Disapproved');
    }































}
