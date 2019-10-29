<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate(['title'=>'required|unique:categories,title|max:20']);
        Category::add($request->all());

        return redirect()->route('category.index')->with('status', 'Категоря создана!');
    }

    public function edit($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(['title' => [
                                            'required',
                                            'max:20',
                                            Rule::unique('categories')->ignore($id),
                                       ],
            ]);

        $category = Category::find($id);
        $category->update($request->all());

        return redirect()->route('category.index')->with('status', 'Категория обновлена!!');
    }

    public function destroy($id)
    {
        Category::destroy($id);

        return redirect()->route('category.index')->with('status', 'Категория удалена!');
    }
}
