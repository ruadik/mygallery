<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::pluck('title', 'id');
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users,name',
            'email' => 'required|unique:users,email|email',
            'password' => 'required',
            'role_id' => 'required',
            'avatar' => 'nullable|image'
        ]);
        $user = User::add($request->all());
        $user->generatePassword($request->password);
        $user->generateToken($request->_token);
        $user->uploadAvatar($request->file('avatar'));
        $user->setStatus($request->status);

        return redirect()->route('users.index')->with('status', 'Пользователь добавлен');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('title', 'id')->except($user->role_id);

        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => [
                'required',
                Rule::unique('users')->ignore($id),
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($id),
            ],
            'avatar' => 'image|nullable'
        ]);

        $user = User::find($id);
        $user->edit($request->except('password', 'role_id'));
        $user->generatePassword($request->password);
        $user->setRole($request->role_id);
        $user->uploadAvatar($request->file('avatar'));
        $user->setStatus($request->status);

        return redirect()->route('users.index')->with('status', 'Данные пользователя обновлены');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->remove();

        return redirect()->route('users.index')->with('status', 'Пользователь удален');
    }
}
