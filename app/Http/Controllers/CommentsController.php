<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
        $this->middleware('admin')->only(['index']);
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
        $comment->blog_post_id = $data['blogPostId'];
        $comment->body = $data['body'];
        $comment->save();

        return response()->json([
            'success' => true
        ]);
    }

    public function destroy(Comment $comment)
    {
        $onPost = true;
        if(Auth::user()->isAdmin) {
            $comment->delete($comment);
            if (request()->query('onPost') == 'false') {
                $onPost = false;
            }
            return response()->json([
                'onPost' => $onPost
            ]);
        }
    }

    // For validating the comment fields
    private function validateRequest(){
        return request()->validate([
            'body'=> 'required',
            'blogPostId'=> 'required'
        ]);
    }
}
