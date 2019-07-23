<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;

class LikesController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data = $this->validateRequest();
        dd($data);
        // $like = new Like();
        // $like->user_id = Auth::user()->id;
        // $like->blog_post_id = $data['blogPostId'];
        // $like->save();

        // return true;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy(Like $like)
    {
        dd($like);
        $like->delete($like);
    }

    // For validating the blog post fields
    private function validateRequest() {
        return request()->validate([
            'blogPostId'=> 'required|numeric'
        ]);
    }
}
