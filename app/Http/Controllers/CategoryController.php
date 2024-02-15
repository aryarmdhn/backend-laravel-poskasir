<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);
        return view('pages.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('pages.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $category = new Category;
        $category->name = $request->name;
        $category->description = $request->description;

        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/categories', $filename);
            $category->image = $filename;
        }
    
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category berhasil di buat');
    }
    public function show($id)
    {
        return view('pages.categories.show');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('pages.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        

        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/categories', $filename);
            $category->image = $filename;
        }
    
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category berhasil Di Edit!');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category berhasil di Hapus!');
    
    }
}
