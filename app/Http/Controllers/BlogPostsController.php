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
        $this->middleware('auth')->except(['show']);
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
        return view('posts.create', compact('post'));
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

        return redirect()->route('profile')->with('notify','Article published!');
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
        $like_count = Like::where('blog_post_id', $post->id)->get()->count();
        $didLike = Like::where([
            ['blog_post_id', $post->id],
            ['user_id', Auth::user()->id]    
        ])->count();

        if($didLike == 1) {
            $like_status = true;
        } else $like_status = false;
    
        return view('posts.show', compact('post', 'comments', 'like_count', 'like_status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BlogPost  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogPost $post)
    {
        return view('posts.edit', compact('post'));
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

        if(Auth::user()->isAdmin)
            return redirect()->route('posts.index')->with('notify','Article updated!');
        else
            return redirect()->route('profile')->with('notify','Article updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogPost $post)
    {
        $post->delete($post);

        if(Auth::user()->isAdmin)
            return redirect()->route('posts.index')->with('notify','Article deleted!');
        else
            return redirect()->route('profile')->with('notify','Article deleted!');
    }

    // For validating the blog post fields
    private function validateRequest() {
        return request()->validate([
            'title' => 'required|max:100',
            'body'=> 'required'
        ]);
    }
}
