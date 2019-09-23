<?php

namespace TheParadigmArticles\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use TheParadigmArticles\Message;
use TheParadigmArticles\Events\MessageSent;

class ChatController extends Controller
{
    /**
     * Create a new controller instance.
     * Restricted to all guests.
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth')->except('fetchMessages');
        // $this->middleware('guest')->only('sendMessage');
    }

    /**
     * Provides the chat messages resource.
     *
     * @return \TheParadigmArticles\Message
     */
    public function fetchMessages()
    {
        return Message::with('fromUser')->get();
    }

    /**
     * Storing sent chat message and broadcasting
     * message to all clients.
     *
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function sendMessage()
    {
        if (!Auth::check()) return redirect()->route('home');
        $newMessage = request()->message;
        $createdMessage = Message::create([
            'from' => Auth::user()->id,
            'message' => $newMessage,
        ]);

        broadcast(new MessageSent(
            $createdMessage->load('fromUser')
        ))->toOthers();

        return response()->json([
            'success' => true,
            'message' => $newMessage,
        ]);
    }
}
