<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\User;

use Illuminate\Support\Facades\Auth;


class ChatController extends Controller
{


    public function index() {
        $chats = Chat::with('user')->orderBy('created_at', 'desc')->get();

        $loggedInUser = Auth::user();

        $chats = $chats->map(function ($chat) use ($loggedInUser) {
            $isOwnedByLoggedInUser = $loggedInUser && $chat->user && $chat->user->id === $loggedInUser->id;
            $chat->isOwnedByLoggedInUser = $isOwnedByLoggedInUser;

            return $chat;
        });

        return inertia('chats/Chat', compact('chats'));
    }

    public function create($user_id) {
        $user = User::find($user_id);
        return inertia('chats/Chat', compact('user'));
    }


    public function store(Request $request) {
        $request->validate([
            'chat'=>'required',
        ]);

        $user = Auth::user();

        $chat = Chat::create([
            'chat' => $request->chat,


        ]);

        $user->chats()->save($chat);

        return redirect('/chats')->with('Info', 'A new post has been created.');
    }

}
