<?php

namespace TheParadigmArticles\Http\Controllers;

use Illuminate\Http\Request;
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
        $this->middleware('auth');
    }

    /**
     * Provides the chat messages resource.
     *
     * @return \TheParadigmArticles\Message
     */
    public function fetchMessages()
    {
        return Message::with('user')->get();
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
        $newMessage = request()->message;
        $createdMessage = auth()->user()->messages()->create([
            'message' => $newMessage
        ]);

        broadcast(new MessageSent(
            $createdMessage->load('user')
        ))->toOthers();

        return response()->json([
            'success' => true,
            'message' => $newMessage,
        ]);
    }
}
