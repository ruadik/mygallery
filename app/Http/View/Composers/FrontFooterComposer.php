<?php

namespace App\Http\View\Composers;

use App\Category;
use App\Repositories\UserRepository;
use Illuminate\View\View;

class FrontFooterComposer
{

    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }


    public function compose(View $view)
    {
//        $categories = $this->category->all();
//        dd(__METHOD__, $categories, $categories->toArray());
        $categories = $this->category->all();

        $view->with('categories', $categories);
    }
}