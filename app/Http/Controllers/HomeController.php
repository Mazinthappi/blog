<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tags;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $categories = Category::get();
        $tags = Tags::get();
        return view('home.index',compact( 'categories','tags'));
    }
    public function articlePage(Request $request ,$id){
        
       
        $categories = Category::with('article')->where('id',$id)->first();
        // return $categories;
        return view('home.blogs',compact( 'categories'));;
    }
}

