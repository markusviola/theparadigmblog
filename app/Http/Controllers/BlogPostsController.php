<?php

namespace App\Http\Controllers;

use App\BlogPost;
use App\Comment;
use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth')->except(['show']);
        $this->middleware('admin')->only(['index']);
    }

    public function index()
    {
        $posts = BlogPost::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new BlogPost();
        $isCreateMode = true;
        return view('posts.upsert', compact('post', 'isCreateMode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data = $this->validateRequest();
        $post = new BlogPost();
        $post->user_id = Auth::user()->id;
        $post->title = $data['title'];
        $post->body = $data['body'];
        $post->save();
        if (Auth::user()->isAdmin == 1) {
            return redirect()->route('home');
        } else return redirect()
            ->route('profile', Auth::user()->url)
            ->with('notify','Article published!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function show(BlogPost $post)
    {
        $comments = Comment::where('blog_post_id', $post->id)->get()->reverse();
        $user_like = null;
        if (Auth::user() != null) {
            foreach ($post->likes as $like) {
                if ($like->user_id == Auth::user()->id) {
                    $user_like = $like;
                    break;
                }
            }
        }
        if ($user_like != null) {
            $like_id = $user_like->id;
            $like_status = 1;
        } else {
            $like_id = 0;
            $like_status = 0;
        }
        return view('posts.show',
            compact(
                'post',
                'comments',
                'like_status',
                'like_id'
            ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BlogPost  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogPost $post)
    {
        $isCreateMode = false;
        return view('posts.upsert', compact('post', 'isCreateMode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function update(BlogPost $post)
    {
        $post->update($this->validateRequest());

        if(Auth::user()->isAdmin == 1)
            return redirect()->route('posts.index')->with('notify','Article updated!');
        else
            return redirect()->route('profile', Auth::user()->url)->with('notify','Article updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogPost $post)
    {
        $onPost = true;
        $post->delete($post);
        if (request()->query('onPost') == 'false') {
            $onPost = false;
        }
        return response()->json([
            'onPost' => $onPost,
            'isAdmin' => auth()->user()->isAdmin,
            'url' => $post->user->url
        ]);
    }

    // For validating the blog post fields
    private function validateRequest() {
        return request()->validate([
            'title' => 'required|max:100',
            'body'=> 'required'
        ]);
    }
}
