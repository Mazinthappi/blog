<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tags;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function dashboard(){
        $article_count = Article::count();
        $category_count = Category::count();
        $tags_count = Tags::count();
        return view('admin.dashboard', compact('article_count', 'category_count', 'tags_count'));
    }
}
