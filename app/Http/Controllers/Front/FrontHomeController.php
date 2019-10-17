<?php

namespace App\Http\Controllers\Front;

use App\Category;
use App\Http\Controllers\Controller;
use App\Photo;
use App\User;
use Illuminate\Http\Request;

class FrontHomeController extends Controller
{
    public function index()
    {
        $photos = Photo::paginate(8);

        return view('front.dashboard', compact('photos'));
    }

    public function show($id)
    {
        $photo = Photo::findOrFail($id);
        $userPhotos = Photo::where('user_id', $photo->user_id)->limit(4)->get();

        return view('front.photo', compact('photo', 'userPhotos'));
    }

    public function categoryPhotos($catgory_id)
    {
        $photosCategory = Photo::where('category_id', $catgory_id)->paginate(8);
        $category = Category::where('id', $catgory_id)->pluck('title');

        return view('front.CategoryPhotos', compact('photosCategory', 'category'));
    }

    public function userPhotos($id)
    {
        $photosUser = Photo::where('user_id', $id)->paginate(8);
        $User = User::where('id', $id)->pluck('name');

        return view('front.UserPhotos', compact('photosUser', 'User'));
    }
}
