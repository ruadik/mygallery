<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PhotosController extends Controller
{
    public function index()
    {
        $photos = Photo::all();
        return view('admin.photos.index', compact('photos'));
    }

    public function create()
    {
        $categories = Category::pluck('title', 'id');

        return view('admin.photos.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|unique:photos,title|max:10',
            'description'=>'required|max:50',
            'category_id'=>'required',
            'image'=>'required|image'
        ]);
        $photo = Photo::add($request->all());
        $photo->uploadImage($request->image);

        return redirect()->route('photos.index')->with('status', 'Картинка добавлена');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $photo = Photo::find($id);
        $categories = Category::all()->pluck('title','id')->except($photo->category_id);

        return view('admin.photos.edit', compact('photo', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
                                'title' => [
                                            'required',
                                            Rule::unique('photos')->ignore($id),
                                            ],
                                'description' => 'required',
                                'image' => 'image'
                           ]);

        $photo = Photo::find($id);
        $photo->edit($request->all());
        $photo->setCategory($request->category_id);
        $photo->uploadImage($request->image);

        return redirect()->route('photos.index')->with('status', 'Данные обновлены');
    }

    public function destroy($id)
    {
        $photo = Photo::find($id);
        $photo->remove();
        return redirect()->route('photos.index')->with('status', 'Пост фотографии удален');
    }
}
