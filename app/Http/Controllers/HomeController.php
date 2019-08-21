<?php

namespace TheParadigmArticles\Http\Controllers;

use TheParadigmArticles\BlogPost;
use TheParadigmArticles\User;

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
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Eager loading for home posts.
        $posts = BlogPost::with(['user','likes','comments'])
            ->latest()
            ->paginate(10);
        $isSearch = false;
        $hotPosts = $this->getHotTopics();
        $emptyUser = new User();
        return view('home',
            compact('posts', 'isSearch', 'hotPosts', 'emptyUser'));
    }

    /**
     * Searches and displays post by title
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        $isSearch = true;
        $searchTerm = request()->search;

        if (request()->has('searchAnnounce') &&
            !request()->has('searchArticle')) {

            // Search with announcement only filter
            $posts = BlogPost::whereHas(
                'user', function ($query) {
                    $query->where('isAdmin', '=', 1);
                })
                ->where('title','LIKE','%'.$searchTerm.'%');

        } else if (request()->has('searchArticle') &&
            !request()->has('searchAnnounce')) {

            // Search with article only filter
            $posts = BlogPost::whereHas(
                'user', function ($query) {
                    $query->where('isAdmin', '=', 0);
                })
                ->where('title','LIKE','%'.$searchTerm.'%');

        } else {
            // Search in all items
            $posts = BlogPost::with(['user','likes','comments'])
                ->where('title','LIKE','%'.$searchTerm.'%');

        }

        $posts = $posts->latest()->paginate(10);
        $hotPosts = $this->getHotTopics();
        return view('home', compact('posts', 'hotPosts', 'isSearch'));

    }

    /**
     * Searches for the top five hot
     * topics by likes and comments.
     *
     * @return array
     */
    private function getHotTopics() {
        // Uses count of likes & comments to filter
        $hotPosts = BlogPost::withCount(['likes','comments'])
            ->orderBy('likes_count', 'DESC')
            ->orderBy('comments_count', 'DESC')
            ->take(5)
            ->get();

        return $hotPosts;
    }

}
