<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title', 'slug'];

    public function Photos()
    {
        return $this->hasMany(Photo::class);
    }

    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
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
