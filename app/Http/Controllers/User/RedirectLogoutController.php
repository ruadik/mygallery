<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectLogoutController extends Controller
{
    public function RedirectForLogin()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function RedirectForRegister()
    {
        Auth::logout();
        return redirect()->route('register');
    }


}
