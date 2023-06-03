<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Content;



class SiteController extends Controller
{
    public function home() {

        $user = auth()->user();
        $contents = Content::with('user')->orderBy('created_at', 'desc')->get();
        return inertia('Home', [
            'contents' => $contents,

        ]);
    }


    public function loginForm() {
        return inertia('Login');
    }

    public function login(Request $request) {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        $login = auth()->attempt($request->all());

        if($login)
            return redirect('/contents');
        else
            return back()->withErrors(['authentication'=>'Invalid username and/or password.']);
    }

    public function logout() {
        auth()->logout();
        return redirect('/login');
    }
}
