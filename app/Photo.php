<?php

namespace App;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class Photo extends Model
{
    protected $fillable = ['title', 'description'];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public static function add($filds)
    {
        $photo = new self;
        $photo->user_id=1;
        $photo->category_id = $filds['category_id'];
        $photo->fill($filds);
        $photo->save();

        return $photo;
    }

    public function edit($filds)
    {
        $this->user_id = 2;
        $this->fill($filds);
        $this->save();
    }

    public function uploadImage($image)
    {
        if($image == null){return;}
        $this->removeImage();
        $fileName = Str::random(10).'.jpg';
        $image->storeAs('/uploads', $fileName);
        $this->setImgSize($fileName);
        $this->image = $fileName;
        $this->save();

        return $fileName;
    }
    public function removeImage()
    {
        if($this->image == null){return;}
        Storage::delete('uploads/'.$this->image);
    }
    public function setImgSize($fileName)
    {
        $height = Image::make('uploads/'.$fileName)->height();
        $width = Image::make('uploads/'.$fileName)->width();
        $size = $this->size=$height.' x '.$width;

        return $size;
    }

    public function getCategoryTitle()
    {
        return($this->Category != null)
        ? $this->Category->title
        : 'Нет категории';
    }

    public function setCategory($category)
    {
        if($category != null) {
            $this->category_id = $category;
            $this->save();
        }
    }

    public function getImage()
    {
        return($this->image != null)
        ? '/uploads/'.$this->image
        : '/img/no-image.jpg';
    }

    public function remove()
    {
        $this->removeImage();
        $this->delete();
    }
}
