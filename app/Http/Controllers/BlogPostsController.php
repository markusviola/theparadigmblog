<?php

namespace App\Http\Controllers;

use App\BlogPost;
use App\Comment;
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
        //
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

        return redirect('/profile');
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
        return view('posts.show', compact('post', 'comments'));
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

        return redirect('profile');
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

        return redirect('profile');
    }

    // For validating the blog post fields
    private function validateRequest(){
        return request()->validate([
            'title' => 'required|max:100',
            'body'=> 'required'
        ]);
    }
}
