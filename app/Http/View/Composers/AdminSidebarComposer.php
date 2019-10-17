<?php

namespace App\Http\View\Composers;

use App\Category;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AdminSidebarComposer
{


    public function __construct()
    {
    }


    public function compose(View $view)
    {
//        $categories = Auth::user()->where('status', 0)->count();
//        dd($categories);
//        dd(__METHOD__, $categories, $categories->toArray());


        $view->with('userName', Auth::user());
        $view->with('countUnBun', Auth::user()->where('status', 0)->count());
        $view->with('countBun', Auth::user()->where('status', 1)->count());
    }
}