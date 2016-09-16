<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SignupRequest;
use App\Http\Requests\SigninRequest;
use App\Models\User;
use Auth;

class AuthUserController extends Controller
{
    public function getSignup()
    {
        return view('user.signup');
    }

    public function getSignin()
    {
        return view('user.signin');
    }

    public function postSignup(SignupRequest $request)
    {
        $params = $request->only('gender', 'name', 'email', 'password');
        $user = User::create($params);
        if (!empty($user)) {
            return redirect()->back()->with([
                config('common.flash_message') => trans('user.msg_success_signup'),
                config('common.flash_level_key') => config('common.flash_level.success')    
            ]);
        }
    }

    public function postSignin(SigninRequest $request)
    {
        $loginSuccess = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);
        if ($loginSuccess) {
            return redirect()->route('home');
        } else {
            return redirect()->back()->with([
                config('common.flash_message') => trans('user.login_error'),
                config('common.flash_level_key') => config('common.flash_level.warning')
            ]);
        }
    }

    public function getSignout(Request $request)
    {
        if (Auth::check()) {
            Auth::logout();
            $request->session()->flush();

            return redirect()->route('home');
        }
    }
}
