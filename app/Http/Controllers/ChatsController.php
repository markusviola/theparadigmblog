<?php

namespace TheParadigmArticles\Http\Controllers;

use Illuminate\Http\Request;
use TheParadigmArticles\Events\MessageSent;
use TheParadigmArticles\Message;

class ChatsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }

    public function index()
    {
        return view('chats');
    }

    public function fetchMessages()
    {
        return Message::with('user')->get();
    }

    public function sendMessage(Request $request)
    {
        $newMessage = $request->message;
        $createdMessage = auth()->user()->messages()->create([
            'message' => $newMessage
        ]);
        broadcast(new MessageSent(
            $createdMessage->load('user')
        ))->toOthers();

        return response()->json([
            'success' => true,
            'message' => $newMessage
        ]);
    }
}
