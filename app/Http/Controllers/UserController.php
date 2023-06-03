<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        $auth = auth()->user();
        return inertia('contents/Author', compact('users', 'auth'));

    }

    public function user()
    {
        $users = User::all();

        return Inertia ('contents/Author', ['users' => $users]);
    }

    public function create() {
        return inertia('users/Create');
    }

    public function store(Request $request) {
        $request->validate([
            'username'=>'required',
            'fullname'=>'required',
            'password' => 'required'
        ]);

        User::create([
            'username' => $request->username,
            'fullname' => $request->fullname,
            'password' => bcrypt($request->password)
        ]);

        return redirect('/login')->with('Info','A new user has been created.');
    }


    public function chat(User $user){
        return inertia('contents/Chat', [
            'user' => $user,
        ]);
    }
}
