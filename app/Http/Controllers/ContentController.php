<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class ContentController extends Controller
{
    public function index() {
        $contents = Content::with('user')->orderBy('created_at', 'desc')->get();

        $loggedInUser = Auth::user();

        $contents = $contents->map(function ($content) use ($loggedInUser) {
            $isOwnedByLoggedInUser = $loggedInUser && $content->user && $content->user->id === $loggedInUser->id;
            $content->isOwnedByLoggedInUser = $isOwnedByLoggedInUser;

            return $content;
        });

        return inertia('Home', compact('contents'));
    }

    public function create() {
        return inertia('contents/Create');
    }



    public function edit(Content $content)
    {

        return inertia('contents.Edit', [
            'content' => $content,
        ]);
    }

    public function update(Request $request, Content $content)
    {
        $fields = $request->validate([
            'content' => 'required',
        ]);

        $content->update($fields);
        $content->real_time = now();
        $content->save();


        return redirect('/contents')->with('message', 'Content updated successfully!');
    }





    public function destroy(Content $content){
        $content->delete();
        return back();
    }




    public function store(Request $request) {
        $request->validate([
            'content'=>'required',
        ]);

        $user = Auth::user();

        $content = Content::create([
            'content' => $request->content,


        ]);

        $user->contents()->save($content);

        return redirect('/contents')->with('Info', 'A new post has been created.');
    }

}
