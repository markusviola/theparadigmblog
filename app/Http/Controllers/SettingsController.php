<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        return view('settings');
    }

    public function update(Request $request, User $setting)
    {
        $withPass = false;
        if (!is_null($request->newPass) && !is_null($request->confirmPass)) {
            $withPass = true;
            $this->validate($request, [
                'newPass' => 'min:8',
                'confirmPass' => 'same:newPass',
                'url' => 'required|max:25',
                'currentPass' => 'required',
            ]);
        } else {
            $this->validate($request, [
                'url' => 'required|max:25',
                'currentPass' => 'required',
            ]);          
        }
        
        $data = $request->all();
        if (!is_null($data['newPass'])) 
            $setting->password = Hash::make($data['newPass']);
        if ($data['url'] != $setting->url) 
            $setting->url = $data['url'];
        $setting->save();

        return view('settings');
        
    }
}
