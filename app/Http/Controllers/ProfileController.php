<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\BlogPost;
use App\User;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('regular')->only(['index']);
    }

    public function index(Request $request)
    {
        $url = $request->user_url;
        $user = User::whereUrl($url)->first();
        $userId = $user->id;
        $userTitle = $user->blogTitle;
        $userDesc = $user->blogDesc;
        $userHeaderImg = $user->blogHeaderImg;
        $posts = BlogPost::where(
            'user_id', 
            $user->id
        )->get()->sortBy('created_at');

        return view('profile', compact(
            'posts',
            'url',
            'userId',
            'userTitle',
            'userDesc',
            'userHeaderImg'
        ));
    }

    public function update(Request $request, User $user)
    {
        $user->blogTitle = $request->blogTitle;
        $user->blogDesc = $request->blogDesc;
        $user->save();

        $data['blogTitle'] = $request->blogTitle;
        $data['blogDesc'] = $request->blogDesc;
        return $data;
    }

    public function updateHeaderImg(User $user)
    {   
        $data = $this->validateImage();

        $user->blogHeaderImg = $data['blogHeaderImg']->store('uploads', 'public');
        $user->save();
        

        return redirect()->route('profile')->with('notify','Profile header updated!');
    }

    private function validateImage()
    {
        return request()->validate([
            'blogHeaderImg' => 'file|image|max:5000',
        ]);
    }
}
