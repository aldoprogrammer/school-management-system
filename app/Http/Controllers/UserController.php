<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function change_password()
    {
        $data['header_title'] = 'Change Password';
        return view('profile.change_password', $data);
    }

    public function change_password_post(Request $request)
    {
        $data['header_title'] = 'Change Password';
        // return view('profile.change_password', $data);
        dd($request->all());
    }
}
