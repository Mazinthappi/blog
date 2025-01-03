<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::paginate(5);
        return view('category.index', compact('categories'));
    }
    public function createPage()
    {
        return view('category.create');
    }

    public function create(CategoryRequest $request)
    {
        $category = $request->all();
        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $filename);
            $category['image'] = $filename;
        }
        $category = Category::create($category);

        // return back()->with('success', 'Category created successfully');
        return redirect()->route('category.index')->with('success', 'Category created successfully');
    }

    public function editPage(string $id)
    {
        $category = Category::find(decrypt($id));
        return  view('category.edit', compact('category'));
    }


    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $category = Category::find(decrypt($id));
        $category->update($request->all());
        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $filename);
            $category['image'] = $filename;
            $category->save();
        }
        return redirect()->route('category.index')->with('success', 'Category updated successfully');
    }


    public function delete(string $id)
    {
        $user = Category::find(decrypt($id));
        if ($user) {
            $user->delete();
            return redirect()->route('category.index')->with('success', 'Category deleted successfully');
        }
        return redirect()->route('category.index')->with('error', 'Category not found');
    }
}
