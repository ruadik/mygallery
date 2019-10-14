<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function Photos()
    {
        return $this->hasMany(Photo::class);
    }
    public function Categories()
    {
        return $this->hasMany(Category::class);
    }
    public function Roles()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public static function add($filds)
    {
        $user = new self();
        $user->email_verified_at = Carbon::now();
        $user->fill($filds);
        $user->save();

        return $user;
    }

    public function generatePassword($password)
    {
        if($password == null){return;}
        $this->password = Hash::make($password);
        $this->save();
    }

    public function generateToken($_token)
    {
        $this->remember_token = Hash::make($_token);
        $this->save();
    }

    public function Bun()
    {
        $this->status = 1;
        $this->save();
    }
    public function unBun()
    {
        $this->status = 0;
        $this->save();
    }
    public function setStatus($status)
    {
        return($status == null)
        ? $this->unBun()
        : $this->Bun();
    }

    public function getStatus()
    {
        return($this->status == 1)
        ? 'Забанен'
        : 'Активный';
    }

    public function getStatusCheck()
    {
        return($this->status == 0)
            ? ''
            : 'checked';
    }

    public function getRole()
    {
        return($this->Roles == null)
            ? 'Роль отсуствует'
            : $this->Roles->title;
    }

    public function setRole($role)
    {
        if($role == null){
            return;
        }
        $this->role_id = $role;
        $this->save();
    }

    public function getAvatar()
    {
        return($this->avatar == null)
            ? '/img/avatar_no-user.png'
            : '/avatars/'.$this->avatar;
    }

    public function uploadAvatar($image)
    {
        if($image == null){return;}
        $this->removeAvatar();
        $avatarName = Str::random(10).'.jpg';
        $image->storeAs('avatars', $avatarName);
        $this->saveAvatarName($avatarName);
        $this->resizeAvatar();
    }
    public function saveAvatarName($avatarName)
    {
        $this->avatar = $avatarName;
        $this->save();
    }
    public function resizeAvatar()
    {
        $img = Image::make('avatars/'.$this->avatar);
        $img->resize(128, 128);
        $img->save();
    }
    public function removeAvatar()
    {
        if($this->avatar == null){return;}
        Storage::delete('avatars/'.$this->avatar);
    }

    public function edit($filds)
    {
        $this->fill($filds);
        $this->save();
    }

    public function remove()
    {
        $this->removeAvatar();
        $this->delete();
    }
}
