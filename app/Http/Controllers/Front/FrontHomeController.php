<?php

namespace App\Http\Controllers\Front;

use App\Category;
use App\Http\Controllers\Controller;
use App\Photo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FrontHomeController extends Controller
{
    public function index()
    {
        $photos = Photo::paginate(8);

        return view('front.dashboard', compact('photos'));
    }

    public function show($slug)
    {
        $photo = Photo::where('slug', $slug)->firstOrFail();
        $userPhotos = Photo::where('user_id', $photo->user_id)->limit(4)->get();

        return view('front.photo', compact('photo', 'userPhotos'));
    }

    public function categoryPhotos($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $photosCategory = Photo::where('category_id', $category->id)->paginate(8);

        return view('front.CategoryPhotos', compact('photosCategory', 'category'));
    }

    public function userPhotos($id)
    {
        $photosUser = Photo::where('user_id', $id)->paginate(8);
        $User = User::where('id', $id)->pluck('name');

        return view('front.UserPhotos', compact('photosUser', 'User'));
    }

    public function download($id)
    {
        $photo = Photo::find($id);
        $path = 'uploads/'.$photo->image;
        return Storage::download($path);
//        return
    }
}
