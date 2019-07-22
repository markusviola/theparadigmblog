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

    public function index()
    {
        $comments = Comment::all();

        return view('comments.index', compact('comments'));
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

    public function destroy(Comment $comment)
    {
        if(Auth::user()->isAdmin) {
            $comment->delete($comment);
            if (request()->query('onPost') == 'false') {
                return redirect()
                    ->route('comments.index')
                    ->with('notify','Comment deleted!');
            } else return redirect()
                    ->back()
                    ->with('notify','Comment deleted!');
        }
            
    }

    // For validating the blog post fields
    private function validateRequest(){
        return request()->validate([
            'body'=> 'required',
            'blog_post_id' => 'required'
        ]);
    }    
}
