<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getAdmin();
        $data['header_title'] = 'Admin List';
        return view('admin.admin.list', $data);
    }

    public function add()
    {
        $data['header_title'] = 'Add Admin';
         return view('admin.admin.add', $data);
    }

    public function insert(Request $request)
    {
        $data['header_title'] = 'Add Admin';
        $user = new User;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->user_type = 1;
        $user->save();
        return redirect('admin/admin/list')->with('success', 'Admin Added Successfully');
    }

    public function edit($id)
    {
        $data['header_title'] = 'Edit Admin';
        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord'])) {
            return view('admin.admin.edit', $data);
        }
        else {
            abort(404);
        }

    }

    public function update(Request $request, $id)
    {
        $data['header_title'] = 'Edit Admin';
        $user = User::getSingle($id);
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        if(!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect('admin/admin/list')->with('success', 'Admin Updated Successfully');
    }
}
