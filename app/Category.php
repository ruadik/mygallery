<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title'];

    public function Photos()
    {
        return $this->hasMany(Photo::class);
    }


    public static function add($filds){
        $category = new static();
        $category->fill($filds);
        $category->save();

        return $category;
    }

    public function isActive($category_id)
    {
        return(request()->path() == 'category/photos/'.$category_id)
            ? true
            : false;
    }

}
