<?php

namespace TheParadigmArticles\Http\Controllers;

use TheParadigmArticles\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    /**
     * Create a new controller instance.
     * Restricted to all guests
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }

    /**
     * Shows form for updating user settings.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('settings');
    }

    /**
     * Update the article post in database.
     *
     * @param  \TheParadigmArticles\User  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(User $setting)
    {
        $isUrlOnly = true;

        // Validates case to case basis inputs.
        if (!is_null(request()->newPassword) &&
            !is_null(request()->confirmPassword)) {
            $isUrlOnly = false;
        }

        $data = $this->validateRequest($isUrlOnly);
        if (Hash::check($data['currentPassword'], $setting->password)) {
            if (!$isUrlOnly)
                $setting->password = Hash::make($data['newPassword']);
            if ($data['url'] != $setting->url)
                $setting->url = $data['url'];
            $setting->save();

            return redirect()
                ->route('settings.index')
                ->with('notify','Account settings updated!');
        } else {
            return redirect()
                ->route('settings.index')
                ->with('notify','Provided wrong password!');
        }
    }

    private function validateRequest(bool $onlyUrl) {
        if ($onlyUrl) {
            return request()->validate([
                'url' => 'required|max:25|unique:users,url,'.Auth::user()->id,
                'currentPassword' => 'required',
            ]);
        } else {
            return request()->validate([
                'newPassword' => 'min:8',
                'confirmPassword' => 'same:newPassword',
                'url' => 'required|max:25|unique:users,url,'.Auth::user()->id,
                'currentPassword' => 'required',
            ]);
        }
    }
}
