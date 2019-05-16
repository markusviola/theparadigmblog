<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\BlogPost;
use App\User;

class ProfileController extends Controller
{
    public function index()
    {
        $posts = BlogPost::where(
            'user_id', 
            Auth::user()->id
        )->get()->sortBy('created_at');

        return view('profile', compact('posts'));
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
        

        return redirect()->route('profile');
    }

    private function validateImage(){
        return request()->validate([
            'blogHeaderImg' => 'file|image|max:5000',
        ]);
    }
}
