<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Audio;
use App\Models\Book;
use App\Models\Card;
use App\Models\Category;
use App\Models\Like;
use App\Models\User;
use App\Models\video;
use App\Models\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use function PHPUnit\Framework\StaticAnalysis\HappyPath\AssertIsArray\consume;

class HomeController extends Controller
{

    public function clear(){

        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        Artisan::call('view:clear');
        Artisan::call('config:clear');

        // Redirect back or to a relevant page
        return back()->with('success', 'Cache cleared successfully.');
    }

    public function index(){

        $videos     = \App\Models\Video::select('videos.*','categories.name as categoryName','users.name as userName')
            ->join('categories','categories.id','=','videos.category')
            ->join('users','users.id','=','videos.userId')
            ->where('videos.status',1)
            ->orderBy('videos.id','DESC')
            ->take(6)
            ->get();

        $words     = Word::select('words.*','categories.name as categoryName','users.name as userName','users.photo as userPhoto')
            ->join('categories','categories.id','=','words.category')
            ->join('users','users.id','=','words.userId')
            ->where('words.status',1)
            ->orderBy('words.id','DESC')
            ->take(12)
            ->get();

        $cardCategories = Card::select('name')
            ->join('categories','categories.id','=','cards.category')
            ->groupBy('name')
            ->take(8)
            ->get();

        $audios    = Audio::select('audio.*','categories.name as categoryName','users.name as userName','users.photo as userPhoto')
            ->join('categories','categories.id','=','audio.category')
            ->join('users','users.id','=','audio.userId')
            ->where('audio.status',1)
            ->orderBy('audio.id','DESC')
            ->take(6)
            ->get();


        $books  =    Book::select('books.id','books.bookName','books.description','books.created_at','categories.name as categoryName')
            ->join('categories','categories.id','=','books.category')
            ->join('users','users.id','books.userId')
            ->where('books.status',1)
            ->orderBy('books.id','DESC')
            ->take(6)
            ->get();

        $findSelectedWord   = Word::select('words.*','categories.name as categoryName','users.name as userName')
            ->join('categories','categories.id','=','words.category')
            ->join('users','users.id','=','words.userId')
            ->where('selected',1)->take(2)->get();


        $findSelectedVideo  = \App\Models\Video::select('videos.*','categories.name as categoryName','users.name as userName')
            ->join('categories','categories.id','=','videos.category')
            ->join('users','users.id','=','videos.userId')
            ->where('selected',1)->take(2)->get();

        return view('home',compact('audios','books','cardCategories','videos','words','findSelectedVideo','findSelectedWord'));

    }

    public function autoSearch(Request $request)
    {

        if ($request->search) {

            $query = $request->get('search');
            $featuredPoets = DB::table('users')
                ->where('name', 'LIKE', "%{$query}%")
                ->get();

            return view('searchedPoets',compact('featuredPoets'));
        }

//        if ($request->get('query')) {
//
//            $query = $request->get('query');
//            $data = DB::table('users')
//                ->where('name', 'LIKE', '%' . $query . '%')
//                ->get();
//
//            $output = '<ul class="list-group" style="position:absolute; width:90%;  max-height:250px; box-sizing:border-box; z-index:1001; cursor:pointer; overflow-y:auto;">';
//            foreach ($data as $row) {
//
//                $output .= '<li class="list-group-item">
//
//                    ' . $row->name .
//                    '</li>';
//            }
//            $output .= '</ul>';
//            echo $output;
//        }

    }

    public function viewPoet($id){

        $video  = video::select('videos.*','categories.name as categoryName','users.name as userName','users.photo','users.bio','users.email','users.phone')
            ->join('categories','categories.id','=','videos.category')
            ->join('users','users.id','=','videos.userId')
            ->where([['videos.status',1],['videos.id',$id]])
            ->first();

        if ($video != null){

            $categories = Category::all();

            $cards      = Card::where('category',$video->category)->get();

            $videos     = video::where('category',$video->category)->get();

            $books = Book::select('books.*','categories.name as categoryName','users.name as userName')
                ->join('categories','categories.id','=','books.category')
                ->join('users','users.id','=','books.userId')
                ->where('status',1)
                ->orderBy('id','Desc')
                ->get();
        }

        $likes      = Like::all()->where('poetryId',$id)->count();

        return view('viewPoet',compact('books','video','categories','likes','cards','videos'));
    }

    public function viewWordPoet($id){

        $word = Word::select('words.*','categories.name as categoryName','users.name as userName','users.photo','users.bio','users.email','users.phone')
            ->join('categories','categories.id','=','words.category')
            ->join('users','users.id','=','words.userId')
            ->where('words.status',1)
            ->where([['words.status',1],['words.id',$id]])
            ->first();

        $categories = Category::all();

        $likes      = Like::all()->where('poetryId',$id)->count();

        $cards      = Card::where('category',$word->category ?? 0)->get();

        $videos     = video::where('category',$word->category ?? 0)->get();

        $audios     = video::where('category',$word->category ?? 0)->get();

        $words      = Word::where('category',$word->category ?? 0)->get();

        $books = Book::select('books.*','categories.name as categoryName','users.name as userName')
            ->join('categories','categories.id','=','books.category')
            ->join('users','users.id','=','books.userId')
            ->where('status',1)
            ->orderBy('id','Desc')
            ->get();

        return view('viewWordPoet',compact('books','word','audios','words','categories','likes','cards','videos'));
    }

    public function poetsVideos(){

        $videos     = video::select('videos.*','categories.name as categoryName','users.name as userName')
            ->join('categories','categories.id','=','videos.category')
            ->join('users','users.id','=','videos.userId')
            ->where('videos.status',1)
            ->orderBy('videos.id','DESC')
            ->get();

        $audios    = Audio::select('audio.*','categories.name as categoryName','users.name as userName')
            ->join('categories','categories.id','=','audio.category')
            ->join('users','users.id','=','audio.userId')
            ->where('audio.status',1)
            ->orderBy('audio.id','DESC')
            ->get();

        return view('poetsVideos',compact('videos','audios'));
    }

    public function noFound(){

        return view('notFound');
    }

    public function aboutPage(){

        $aboutPage = About::first();

        return view('aboutPage',compact('aboutPage'));
    }

    public function mariagorethPoetry(){

        $userId     = User::select('id')->where('email','mcgoreth2@gmail.com')->value('id');

        $videos     = video::select('videos.*','categories.name as categoryName','users.name as userName')
            ->join('categories','categories.id','=','videos.category')
            ->join('users','users.id','=','videos.userId')
            ->where([['videos.status',1],['videos.userId',$userId]])
            ->orderBy('videos.id','DESC')
            ->get();

        $audios    = Audio::select('audio.*','categories.name as categoryName','users.name as userName')
            ->join('categories','categories.id','=','audio.category')
            ->join('users','users.id','=','audio.userId')
            ->where([['audio.status',1],['audio.userId',$userId]])
            ->orderBy('audio.id','DESC')
            ->get();

        $words     = Word::select('words.*','categories.name as categoryName','users.name as userName')
            ->join('categories','categories.id','=','words.category')
            ->join('users','users.id','=','words.userId')
            ->where('words.status',1)
            ->where([['words.status',1],['words.userId',$userId]])
            ->get();

        $cards     = Card::select('cards.*','categories.name as categoryName','users.name as userName')
            ->join('categories','categories.id','=','cards.category')
            ->join('users','users.id','=','cards.userId')
            ->where('cards.userId',$userId)
            ->get();

        $books = Book::select('books.*','categories.name as categoryName','users.name as userName')
            ->join('categories','categories.id','=','books.category')
            ->join('users','users.id','=','books.userId')
            ->where([['status',1],['books.userId',$userId]])
            ->orderBy('id','Desc')
            ->get();

        $about = User::find($userId);

        return view('mariagorethPoetry',compact('books','cards','about','videos','audios','words'));
    }

    public function allPoetry(){

        $words     = Word::select('words.*','categories.name as categoryName','users.name as userName')
            ->join('categories','categories.id','=','words.category')
            ->join('users','users.id','=','words.userId')
            ->where('words.status',1)
            ->orderBy('words.id','DESC')
            ->take(9)
            ->get();

        return view('allPoetry',compact('words'));


    }

    public function allPoetrikaVideos(){

         $videos     = video::select('videos.*','categories.name as categoryName','users.name as userName')
             ->join('categories','categories.id','=','videos.category')
             ->join('users','users.id','=','videos.userId')
             ->where('videos.status',1)
             ->orderBy('videos.id','DESC')
             ->take(9)
             ->get();

         return view('allPoetrikaVideos',compact('videos'));

     }

     public function allAudios(){


         $audios    = Audio::select('audio.*','categories.name as categoryName','users.name as userName')
             ->join('categories','categories.id','=','audio.category')
             ->join('users','users.id','=','audio.userId')
             ->where('audio.status',1)
             ->orderBy('audio.id','DESC')
             ->get();

         return view('allAudios',compact('audios'));

     }

     public function viewPoetryByCategories($categoryId){

        $userId     = User::select('id')->where('email','mcgoreth2@gmail.com')->value('id');

        $videos     = video::select('videos.*','categories.name as categoryName','users.name as userName')
            ->join('categories','categories.id','=','videos.category')
            ->join('users','users.id','=','videos.userId')
            ->where([['videos.status',1],['videos.category',$categoryId]])
            ->orderBy('videos.id','DESC')
            ->get();

        $audios    = Audio::select('audio.*','categories.name as categoryName','users.name as userName')
            ->join('categories','categories.id','=','audio.category')
            ->join('users','users.id','=','audio.userId')
            ->where([['audio.status',1],['audio.category',$categoryId]])
            ->orderBy('audio.id','DESC')
            ->get();

        $words     = Word::select('words.*','categories.name as categoryName','users.name as userName')
            ->join('categories','categories.id','=','words.category')
            ->join('users','users.id','=','words.category')
            ->where('words.status',1)
            ->where([['words.status',1],['words.category',$categoryId]])
            ->get();

        $cards     = Card::select('cards.*','categories.name as categoryName','users.name as userName')
            ->join('categories','categories.id','=','cards.category')
            ->join('users','users.id','=','cards.userId')
            ->where('cards.category',$categoryId)
            ->get();

         $books = Book::select('books.*','categories.name as categoryName','users.name as userName')
             ->join('categories','categories.id','=','books.category')
             ->join('users','users.id','=','books.userId')
             ->where([['status',1],['books.category',$categoryId]])
             ->orderBy('id','Desc')
             ->get();


        $categoryName = Category::find($categoryId);

        $about       = User::find($userId);

        $categories = Category::all();

        return view('viewPoetryByCategories',compact('books','cards','categories','categoryName','about','videos','audios','words'));
    }

    public function featuredPoets(){

        $featuredPoets = User::orderBy('name','ASC')->get();

        return view('featuredPoets',compact('featuredPoets'));
    }

    public function viewByPoet($id){

        $poet = User::find($id);

        $videos     = video::select('videos.*','categories.name as categoryName','users.name as userName')
            ->join('categories','categories.id','=','videos.category')
            ->join('users','users.id','=','videos.userId')
            ->where([['videos.status',1],['videos.userId',$id]])
            ->orderBy('videos.id','DESC')
            ->get();

        $audios    = Audio::select('audio.*','categories.name as categoryName','users.name as userName')
            ->join('categories','categories.id','=','audio.category')
            ->join('users','users.id','=','audio.userId')
            ->where([['audio.status',1],['audio.userId',$id]])
            ->orderBy('audio.id','DESC')
            ->get();

        $words     = Word::select('words.*','categories.name as categoryName','users.name as userName')
            ->join('categories','categories.id','=','words.category')
            ->join('users','users.id','=','words.userId')
            ->where([['words.status',1],['words.userId',$id]])
            ->get();

        $cards     = Card::select('cards.*','categories.name as categoryName','users.name as userName')
            ->join('categories','categories.id','=','cards.category')
            ->join('users','users.id','=','cards.userId')
            ->where('cards.userId',$id)
            ->get();

        $books = Book::select('books.*','categories.name as categoryName','users.name as userName')
            ->join('categories','categories.id','=','books.category')
            ->join('users','users.id','=','books.userId')
            ->where([['status',1],['books.userId',$id]])
            ->orderBy('id','Desc')
            ->get();

        return view('viewByPoet',compact('books','cards','poet','videos','audios','words'));
    }

    public function reset(){

        return view('auth.reset');

    }

    public function resetPassword($id){

        return view('auth.resetPassword',compact('id'));

    }

    public function forgetPassword(Request $request){

        $user = User::select('id')->where('email',$request->email)->value('id');

        if ($user ==  null){

            return back()->with('')->with('error',' no account record found');

        }else{

            $userDetails = User::find($user);
            $link        =  '<a href='.route('resetPassword',$userDetails->id).'>Reset My Password</a>';

            Mail($userDetails->email,'Poetrika Password Reset',$link,'Password Reset');

            return redirect(route('login'))->with('success',' reset link sent to your email');
        }
    }

    public function saveNewPassword(Request $request,$id){


            if ($request->password !=  $request->repeatPassword){

                return back()->with('')->with('error',' Passwords do not match');

            }else{

                $userDetails = User::find($id);

                $userDetails->password = Hash::make($request->password);
                $userDetails->save();

                return redirect(route('login'))->with('success',' Your successful changed you password');
            }
        }

    public function likes($id){

        $checkLiked = Like::select('id')->where([['poetryId',$id],['cutsomerId',Auth::id()]])->first();


        if($checkLiked != null){

            Like::find($checkLiked->id)->delete();
            return redirect()->back();

        }else{
            $like = new Like();

            $like-> cutsomerId  = Auth::id();
            $like->poetryId     = $id;
            $like->save();

            return redirect()->back();

        }


    }

    public function cardsPost(){

        $cardCategories = Card::select('name')
            ->join('categories','categories.id','=','cards.category')
            ->groupBy('name')
            ->get();

        return view('cards',compact('cardCategories'));

    }

    public function allBooks(){

        $booksCategories = Book::select('name')
            ->join('categories','categories.id','=','books.category')
            ->where('books.status',1)
            ->groupBy('name')
            ->get();

        return view('books',compact('booksCategories'));

    }

    public function allBooksByCategory($id){

        $books = Book::select('books.*','categories.name as categoryName','users.name as userName')
            ->join('categories','categories.id','=','books.category')
            ->join('users','users.id','=','books.userId')
            ->where([['books.status',1],['books.category',$id]])
            ->orderBy('id','Desc')
            ->get();

        return view('allBooksByCategory',compact('books'));

    }

    public function viewCards($id)
    {

        $cards     = Card::select('cards.*','categories.name as categoryName','users.name as userName')
            ->join('categories','categories.id','=','cards.category')
            ->join('users','users.id','=','cards.userId')
            ->where('cards.category',$id)
            ->get();


        return view('viewCards',compact('cards'));

    }

    public function viewUserCards($id)
    {

        $cards     = Card::select('cards.*','categories.name as categoryName','users.name as userName','users.id as userId')
            ->join('categories','categories.id','=','cards.category')
            ->join('users','users.id','=','cards.userId')
            ->where('userId',$id)
            ->get();


        $cardCategories = Card::select('name')
            ->join('categories','categories.id','=','cards.category')
            ->groupBy('name')
            ->get();

        return view('viewUserCards',compact('cards','cardCategories'));

    }

    public function notFound(){
        return view('404');
    }















//    public function changeStatus(Request $request)
//    {
//        $user           = Word::find($request->user_id);
//        $user->status   = $request->status;
//        $user->save();
//
//        return response()->json(['success'=>'Status change successfully.']);
//    }






































}
