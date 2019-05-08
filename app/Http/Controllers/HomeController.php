<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogPost;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // USE THIS FOR CONTROLLERS THAT NEED VERIFICATION
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = BlogPost::all();
        return view('home', compact('posts'));
    }
}
