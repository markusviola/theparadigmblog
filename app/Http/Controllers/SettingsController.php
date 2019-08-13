<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function index()
    {
        parent::__construct();
        return view('settings');
    }

    public function update(Request $request, User $setting)
    {
        if (!is_null($request->newPassword) && !is_null($request->confirmPassword)) {
            $this->validate($request, [
                'newPassword' => 'min:8',
                'confirmPassword' => 'same:newPassword',
                'url' => 'required|max:25|unique:users,url,'.Auth::user()->id,
                'currentPassword' => 'required',
            ]);
        } else {
            $this->validate($request, [
                'url' => 'required|max:25|unique:users,url,'.Auth::user()->id,
                'currentPassword' => 'required',
            ]);
        }

        $data = $request->all();
        if (!is_null($data['newPassword']))
            $setting->password = Hash::make($data['newPassword']);
        if ($data['url'] != $setting->url)
            $setting->url = $data['url'];
        $setting->save();

        return redirect()
            ->route('settings.index')
            ->with('notify','Account settings updated!');
    }
}
