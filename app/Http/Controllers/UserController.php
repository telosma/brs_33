<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\User;
use Auth;

class UserController extends Controller
{

    public function show($id)
    {
        $userInfo = User::find($id);
        if (is_null($userInfo)) {
            return redirect()->route('home');
        }

        return view('user.profile')->with(['userInfo' => $userInfo, 'name' => 'telo']);
    }

    public function getEditProfile()
    {
        return view('user.profiledetail')->with('user', Auth::user());
    }

    public function postUpdateProfile(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required|max:40',
                'gender' => 'required',
            ]);
            $user = Auth::user();
            $params = $request->only(['name', 'gender', 'avatar_link']);
            $user->update($params);

            return redirect()->route('getEditProfile');
        } catch (\Exception $e) {
            return redirect()->route('getEditProfile')->with([
                config('common.flash_message') => trans('user.msg_unsuccess_update_profile'),
                config('common.flash_level_key') => config('common.flash_level.warning')
            ]);
        }
    }
}
