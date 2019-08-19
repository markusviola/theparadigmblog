<?php

namespace TheParadigmArticles\Http\Controllers;

use TheParadigmArticles\Comment;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    /**
     * Create a new controller instance.
     * Restricted to all guests.
     * Only admin can access index.
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
        $this->middleware('admin')->only(['index']);
    }

    /**
     * Shows list of posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Lazy loading for comments.
        $comments = Comment::with([])
            ->latest()
            ->paginate(10);

        return view('comments.index',
            compact('comments'));
    }

    /**
     * Store a newly created comments in database.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove a comment from database.
     *
     * @param  \TheParadigmArticles\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        // Checks if the request is from the article post.
        $onPost = true;
        if (Auth::user()->isAdmin ||
            Auth::user()->id == $comment->user->id)
        {
            $comment->delete($comment);
            if (request()->query('onPost') == 'false') {
                $onPost = false;
            }
            return response()->json([
                'onPost' => $onPost
            ]);
        }
    }

    /**
     * For validating the request fields
     * @param \Illuminate\Http\Request
     * @return array
     */
    private function validateRequest(){
        return request()->validate([
            'body'=> 'required',
            'blogPostId'=> 'required'
        ]);
    }
}
