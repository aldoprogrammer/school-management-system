<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ParentController extends Controller
{
    public function  list()
    {
        $data['getRecord'] = User::getParent();
        $data['header_title'] = 'Parent List';

        return view('admin.parent.list', $data);
    }

    public function add()
    {
        $data['header_title'] = 'Add Parent';
        return view('admin.parent.add', $data);
    }

    public function insert(Request $request)
    {
        $request->validate([
            'mobile_number' => 'max:15|min:7',
            'email' => 'required|email|unique:users',
            'address' => 'max:255',
            'occupation' => 'max:255'
        ]);

        $student = new User;
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->gender = trim($request->gender);
        $student->address = trim($request->address);
        $student->occupation = trim($request->occupation);
        if(!empty($request->date_of_birth)){
            $student->class_id = trim($request->date_of_birth);
        }
        $student->mobile_number = trim($request->mobile_number);
        if(!empty($request->file('profile_pic')))
        {
            $file = $request->file('profile_pic');
            $extension = $file->getClientOriginalExtension();
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$extension;
            $file->move('upload/profile/', $filename);
            $student->profile_pic = $filename;
        }
        $student->email = trim($request->email);
        $student->password = trim($request->password);
        $student->user_type = 4;
        $student->save();

        return redirect('admin/parent/list')->with('success', 'Parent Added Successfully');

    }
}
