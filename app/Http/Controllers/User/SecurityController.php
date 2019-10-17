<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SecurityController extends Controller
{
    public function edit()
    {
        $user = User::find(Auth::user()->id);
        return view('user.Security-info', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'current_password' => 'required|string|min:8|current_password',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $user = User::find($id);

        $user->generatePassword($request->password);

        return redirect()->route('profile.user')->with('status', 'Ваш пароль обновлен');
    }
}
