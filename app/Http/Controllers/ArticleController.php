<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tags;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
   


    public function index()
    {
        $articles = Article::with('tag','category')->paginate(5);
        // return $articles;
       
        return view('article.index', compact('articles'));
    }
    public function createPage()
    {
        $categories=Category::get();
        $tags = Tags::get();
        return view('article.create',compact('categories','tags'));
    }

    public function create(ArticleRequest $request)
    {
        $article = $request->all();
        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $filename);
            $article['image'] = $filename;
        }
        $article = Article::create($article);

        // return back()->with('success', 'Category created successfully');
        return redirect()->route('article.index')->with('success', 'Article created successfully');
    }

    public function editPage(string $id)
    {
        $categories=Category::get();
        $tags = Tags::get();
        $article = Article::with('category','tag')->find(decrypt($id));
        return  view('article.edit', compact('article','categories','tags'));
    }


    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           

        ]);
        $article = Article::find(decrypt($id));
        // dd($request->all());
        $article->update($request->all());
        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $filename);
            $article['image'] = $filename;
            $article->save();
        }
        return redirect()->route('article.index')->with('success', 'Article updated successfully');
    }


    public function delete(string $id)
    {
        $user = Article::find(decrypt($id));
        if ($user) {
            $user->delete();
            return redirect()->route('article.index')->with('success', 'Article deleted successfully');
        }
        return redirect()->route('article.index')->with('error', 'Article not found');
    }
}

