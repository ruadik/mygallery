<?php

namespace App;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Auth;
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

    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source'        => 'title',
                'separator'     => '-',
                'unique'        => true,
                'onUpdate'      => true,
            ]
        ];
    }

    public static function add($filds)
    {
        $photo = new self;
        $photo->user_id=Auth::user()->id;
        $photo->category_id = $filds['category_id'];
        $photo->fill($filds);
        $photo->save();

        return $photo;
    }

    public function edit($filds)
    {
        $this->user_id = Auth::user()->id;
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
        $this->imageSave($fileName);
        $this->SetImgSmall($fileName);

        return $fileName;
    }
    public function removeImage()
    {
        if($this->image == null){return;}
        Storage::delete('uploads/'.$this->image);
        Storage::delete('uploads/imgMini/'.$this->image);
    }
    public function imageSave($fileName)
    {
        $this->image = $fileName;
        $this->save();
    }
    public function setImgSize($fileName)
    {
        $height = Image::make('uploads/'.$fileName)->height();
        $width = Image::make('uploads/'.$fileName)->width();
        $size = $this->size=$height.' x '.$width;

        return $size;
    }

    public function SetImgSmall($fileName)
    {
        $img = Image::make('uploads/'.$fileName);
        $img->resize(254, 254);

        $imgSmall_FileName = Str::random(6).'.jpg';
        $img->save('uploads/'.$imgSmall_FileName);
        $this->imgSmallSave($imgSmall_FileName);
    }
    public function imgSmallSave($imgSmall_FileName)
    {
        $this->imgSmall = $imgSmall_FileName;
        $this->save();
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

    public function getImgSmall()
    {
        return($this->image != null)
            ? '/uploads/'.$this->imgSmall
            : '/img/no-image.jpg';
    }

    public function remove()
    {
        $this->removeImage();
        $this->delete();
    }

    public function getDateFormatAttribute($date)
    {
        $date = Carbon::parse($date);
        return $date->format('F j');
    }

}
