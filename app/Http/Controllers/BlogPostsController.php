<?php

namespace TheParadigmArticles\Http\Controllers;

use TheParadigmArticles\BlogPost;
use Illuminate\Support\Facades\Auth;

class BlogPostsController extends Controller
{
    /**
     * Create a new controller instance.
     * Restricted to all guests except show.
     * Only admin can access index.
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth')->except(['show']);
        $this->middleware('admin')->only(['index']);
    }

    /**
     * Shows list of posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Lazy loading for posts.
        $posts = BlogPost::all();
        return view('posts.index',
            compact('posts'));
    }

    /**
     * Show the form for creating a new post.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Create & Edit shares the same
        // blade so this determines it.
        $isCreateMode = true;
        $post = new BlogPost();

        return view('posts.upsert',
            compact('post', 'isCreateMode'));
    }

    /**
     * Store a newly created post in database.
     *
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

        // If admin requests, it goes to home,
        // otherwise, redirects to user profile.
        if (Auth::user()->isAdmin == 1) {
            return redirect()->route('home');
        } else return redirect()
            ->route('profile', Auth::user()->url)
            ->with('notify','Article published!');
    }

    /**
     * Displays the article post resource.
     *
     * @param  \TheParadigmArticles\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function show(BlogPost $post)
    {
        // Prepares like data for post owner.
        $user_like = null;
        if (Auth::user() != null) {
            foreach ($post->likes as $like) {
                if ($like->user_id == Auth::user()->id) {
                    $user_like = $like;
                    break;
                }
            }
        }
        // Setting like ID & like status.
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
                'like_status',
                'like_id'
            ));
    }

    /**
     * Show the form for editing post article.
     *
     * @param  \TheParadigmArticles\BlogPost  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogPost $post)
    {
        // Create & Edit shares the same
        // blade so this determines it.
        $isCreateMode = false;

        return view('posts.upsert',
            compact('post', 'isCreateMode'));
    }

    /**
     * Update the article post in database.
     *
     * @param  \TheParadigmArticles\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function update(BlogPost $post)
    {
        $post->update($this->validateRequest());

        // Redirects to post list if admin,
        // otherwise, to user profile.
        if(Auth::user()->isAdmin == 1)
            return redirect()
                ->route('posts.index')
                ->with('notify','Article updated!');
        else
            return redirect()
                ->route('profile', Auth::user()->url)
                ->with('notify','Article updated!');
    }

    /**
     * Remove a post from database.
     *
     * @param  \TheParadigmArticles\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogPost $post)
    {
        $onPost = true;
        $post->delete($post);

        // Checks if the request is from the article post.
        if (request()->query('onPost') == 'false') {
            $onPost = false;
        }
        return response()->json([
            'onPost' => $onPost,
            'isAdmin' => Auth::user()->isAdmin,
            'url' => $post->user->url
        ]);

    }

    /**
     * For validating the request fields
     * @param \Illuminate\Http\Request
     * @return array
     */
    private function validateRequest() {
        return request()->validate([
            'title' => 'required|max:100',
            'body'=> 'required'
        ]);
    }
}
