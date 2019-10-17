<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = User::find(Auth::user()->id);

        return view('user.profile-info', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->edit($request->all());
        $user->uploadAvatar($request->file('avatar'));

        return redirect()->route('profile.user')->with('status', 'Ваши данные обновлены');
    }
}
