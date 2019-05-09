<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store()
    {
        $data = $this->validateRequest();
        $comment = new Comment();
        $comment->user_id = Auth::user()->id;
        $comment->blog_post_id = $data['blog_post_id'];
        $comment->body = $data['body'];
        $comment->save();

        return back();
    }
    // For validating the blog post fields
    private function validateRequest(){
        return request()->validate([
            'body'=> 'required',
            'blog_post_id' => 'required'
        ]);
    }    
}
