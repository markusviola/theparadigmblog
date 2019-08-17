<?php

namespace TheParadigmArticles\Http\Controllers;

use TheParadigmArticles\BlogPost;
use TheParadigmArticles\Like;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Shows the home post list.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Eager loading for home posts.
        $posts = BlogPost::with(['user','likes','comments'])
            ->get()
            ->reverse();

        return view('home', compact('posts'));

    }
}
