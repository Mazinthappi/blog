<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Models\Tags;
use Illuminate\Http\Request;

class TagController extends Controller

{

    public function index()
    {
        $tags = Tags::paginate(5);
        return view('tag.index', compact('tags'));
    }
    public function createPage()
    {
        return view('tag.create');
    }

    public function create(TagRequest $request)
    {
        $tags = $request->all();
        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $filename);
            $tags['image'] = $filename;
        }
        $tags = Tags::create($tags);

        // return back()->with('success', 'Category created successfully');
        return redirect()->route('tag.index')->with('success', 'Tag created successfully');
    }

    public function editPage(string $id)
    {
        $tags = Tags::find(decrypt($id));
        return  view('tag.edit', compact('tags'));
    }


    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $tags = Tags::find(decrypt($id));
        $tags->update($request->all());
        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $filename);
            $tags['image'] = $filename;
            $tags->save();
        }
        return redirect()->route('tag.index')->with('success', 'Tag updated successfully');
    }


    public function delete(string $id)
    {
        $user = Tags::find(decrypt($id));
        if ($user) {
            $user->delete();
            return redirect()->route('tag.index')->with('success', 'Tag deleted successfully');
        }
        return redirect()->route('tag.index')->with('error', 'Tag not found');
    }
}
