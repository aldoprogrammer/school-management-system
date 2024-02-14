<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPasswordMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
class AuthController extends Controller
{
    public function login ()
    {
        // dd(Hash::make(123456));
        if(!empty(Auth::check()))
        {
            if(Auth::user()->user_type == 1)
            {
                return redirect('/admin/dashboard');
            }
            else if (Auth::user()->user_type == 2)
            {
                return redirect('/teacher/dashboard');
            }
            else if (Auth::user()->user_type == 3)
            {
                return redirect('/student/dashboard');
            }
            else if (Auth::user()->user_type == 4)
            {
                return redirect('/parent/dashboard');
            }
        }

        return view('auth.login');
    }

    public function AuthLogin(Request $request)
    {
        $remember = !empty($request->remember) ? true : false;
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            if(Auth::user()->user_type == 1)
            {
                return redirect('/admin/dashboard');
            }
            else if (Auth::user()->user_type == 2)
            {
                return redirect('/teacher/dashboard');
            }
            else if (Auth::user()->user_type == 3)
            {
                return redirect('/student/dashboard');
            }
            else if (Auth::user()->user_type == 4)
            {
                return redirect('/parent/dashboard');
            }

        }
        else
        {
            return redirect('/')->with('error', 'Invalid Email or Password');
        }
    }

    public function forgotPassword()
    {
        return view('auth.forgot');
    }

    public function PostForgotPassword(Request $request)
    {
        $user = User::getEmailSingle($request->email);
        if(!empty($user))
        {
            $user->remember_token = Str::random(30);
            $user->save();
            Mail::to($user->email)->send(new ForgotPasswordMail($user));
            return redirect('/')->with('success', 'Please check your mail and reset your password');
        }
        else
        {
            return redirect(url('/forgot-password'))->with('error', 'Email Not Found');
        }
    }

    public function reset($token)
    {
        $user = User::getTokenSingle($token);
        if(!empty($user))
        {
            $data['user'] = $user;
            return view('auth.reset', $data);
        }
        else
        {
            abort(404);
        }
    }


    public function PostReset($token, Request $request)
    {
        $user = User::getTokenSingle($token);
        if($user) {
            if($request->password == $request->cpassword) {
                $user->password = Hash::make($request->password);
                $user->remember_token = Str::random(30);
                $user->save();
                return redirect(url(''))->with('success', 'Password Reset Successfully');
            } else {
                return redirect()->back()->with('error', 'Password Confirmation Does Not Match');
            }
        } else {
            abort(404);
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }


}
