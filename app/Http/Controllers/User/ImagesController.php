<?php

namespace App\Http\Controllers\User;

use App\Category;
use App\Http\Controllers\Controller;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ImagesController extends Controller
{

    public function index()
    {
        $photos = Photo::where('user_id', Auth::user()->id)->paginate(8);
        return view('user.PhotosIndex', compact('photos'));
    }

    public function create()
    {
        $categories = Category::pluck('title', 'id');
        return view('user.PhotosCreate', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|unique:photos,title|max:10',
            'description'=>'required|max:200',
            'category_id'=>'required',
            'image'=>'required|image'
        ]);


        $photos = Photo::add($request->all());
        $photos->uploadImage($request->file('image'));

        return redirect()->route('images.index')->with('status', 'Картинка добавлена');
    }

    public function show($id)
    {
        $photo = Photo::findOrFail($id);
        $userPhotos = Photo::where('user_id', $photo->user_id)->limit(4)->get();

        return view('user.PhotosShow', compact('photo', 'userPhotos'));
    }

    public function edit($id)
    {
        $photo = Photo::where('user_id', Auth::user()->id)->findOrFail($id);
        $categories = Category::all()->pluck('title','id')->except('id', $photo->category_id);

        return view('user.PhotosEdit', compact('photo', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
                                'title' => [
                                            'required',
                                            'max:10',
                                            Rule::unique('photos')->ignore($id),
                                            ],
                                'description' => 'required|max:200',
                                'image' => 'image|nullable'
                            ]);
        $photo = Photo::find($id);
        $photo->edit($request->all());
        $photo->setCategory($request->category_id);
        $photo->uploadImage($request->file('image'));

        return redirect()->route('images.index')->with('status', 'Картинка обновлена');
    }

    public function destroy($id)
    {
        $photo = Photo::where('user_id', Auth::user()->id)->findOrFail($id);
        $photo->remove();

        return redirect()->route('images.index')->with('status', 'Картинка удалена');
    }
}
