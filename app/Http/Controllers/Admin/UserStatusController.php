<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserStatusController extends Controller
{
    public function unBan($id)
    {
        $user = User::find($id);
        $user->setStatus();
        return redirect()->route('users.index')->with('status', 'Пользователь РАЗБАНЕН!');
    }

    public function Ban($id)
    {
        $user = User::find($id);
        $user->setStatus();
        return redirect()->route('users.index')->with('status', 'Пользователь ЗАБАНЕН!');
    }
}
