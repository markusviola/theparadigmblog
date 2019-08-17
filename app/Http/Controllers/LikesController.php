<?php

namespace TheParadigmArticles\Http\Controllers;

use TheParadigmArticles\Like;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }

    /**
     * Insertion of like in database.
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data = $this->validateRequest();
        $like = new Like();
        $like->user_id = Auth::user()->id;
        $like->blog_post_id = $data['blogPostId'];
        $like->save();

        return response()->json([
            'like_id' => $like->id
        ]);
    }

    /**
     * Removing a like from database.
     *
     * @param  \TheParadigmArticles\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy(Like $like)
    {
        $like->delete($like);
        return response()->json([
            'like_id' => null
        ]);
    }

    /**
     * For validating the request fields
     * @param \Illuminate\Http\Request
     * @return array
     */
    private function validateRequest() {
        return request()->validate([
            'blogPostId'=> 'required|numeric'
        ]);
    }
}
