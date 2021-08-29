<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', ['categories' => $categories]);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        Category::create($input);
        return redirect('/category');
    }

    public function edit($category)
    {
        $category = Category::find($category);
        return view('categories.edit', ['category' => $category]);
    }

    public function update(Request $request, $category)
    {
        $input = $request->all();

        $category = Category::find($category);
        $category->name = $input['name'];

        $category->save();

        return redirect('/category');
    }

    public function delete($category)
    {
        Category::find($category)->delete();

        return redirect()->back();
    }
}
