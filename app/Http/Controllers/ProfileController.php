<?php

namespace TheParadigmArticles\Http\Controllers;

use Illuminate\Http\Request;
use TheParadigmArticles\BlogPost;
use TheParadigmArticles\User;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     * By preference, index view
     * is for non-admins only.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('non.admin')->only(['index']);
        parent::__construct();
    }

    /**
     * Loads the selected user's profile page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Retrieving only necessary data from user.
        $url = $request->user_url;
        $user = User::whereUrl($url)->first();

        if ($user) {
            $userId = $user->id;
            $userName = $user->username;
            $userTitle = $user->blogTitle;
            $userDesc = $user->blogDesc;
            $userHeaderImg = $user->blogHeaderImg;

            $posts = BlogPost::where('user_id', $user->id)
                ->latest()
                ->paginate(4);

            return view('profile', compact(
                'posts',
                'url',
                'userId',
                'userName',
                'userTitle',
                'userDesc',
                'userHeaderImg'
            ));

        } else abort(404);
    }

    /**
     * Update the profile title & description in database.
     *
     * @param  \TheParadigmArticles\User  $user
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function update(User $user)
    {
        $user->blogTitle = request()->blogTitle;
        $user->blogDesc = request()->blogDesc;
        $user->save();

        return response()->json([
            'blogTitle' => request()->blogTitle,
            'blogDesc' => request()->blogDesc
        ]);
    }

    /**
     * Update the profile header image with filepath
     * stored in database.
     * @param  \TheParadigmArticles\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updateHeaderImg(User $user)
    {
        $data = $this->validateImage();
        $user->blogHeaderImg = $data['blogHeaderImg']
             ->store('uploads', 'public');
        $user->save();

        return redirect()
            ->route('profile', $user->url)
            ->with('notify','Profile header updated!');
    }

    /**
     * For validating the request fields
     * @param \Illuminate\Http\Request
     * @return array
     */
    private function validateImage()
    {
        return request()->validate([
            'blogHeaderImg' => 'file|image|max:5000',
        ]);
    }
}
