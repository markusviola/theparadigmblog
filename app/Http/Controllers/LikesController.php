<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validateRequest();
        $like = new Like();
        $like->user_id = Auth::user()->id;
        $like->blog_post_id = $data['blogPostId'];
        $like->save();
        
        return $like->id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy(Like $like)
    {
        $like->delete($like);
        return 1;
    }

    // For validating the blog post fields
    private function validateRequest() {
        return request()->validate([
            'blogPostId'=> 'required|numeric'
        ]);
    }
}
