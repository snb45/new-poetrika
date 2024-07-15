<?php

namespace App\Http\Controllers;

use App\models\Category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function categories(){

        $categories = Category::all();
        $counter = 1;
        return view('admin.categories',compact('counter','categories'));
    }

    public function editCategories($id){

        $categories = Category::find($id);
        $counter = 1;
        return view('admin.editCategories',compact('counter','categories'));
    }

    public function saveCategories(Request $request){

        $category = new Category();

        $category->name =  $request->name;
        $category->save();

        return redirect()->back()->with('success',' saved');
    }

    public function updateCategories(Request $request,$id){

        $category =  Category::find($id);

        $category->name =  $request->name;
        $category->save();

        return redirect(route('categories'))->with('success',' saved');
    }

    public function deleteCategories($id){

        Category::find($id)->delete();
        return redirect()->back()->with('success',' deleted');

    }
}
