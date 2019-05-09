<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\BlogPost;

class ProfileController extends Controller
{
    public function index(){
        
        $posts = BlogPost::where('user_id', Auth::user()->id)->get();

        return view('profile', compact('posts'));
    }
}
