<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getStudent();
        $data['header_title'] = 'Student List';
        return view('admin.student.list', $data);
    }

    public function add()
    {
        $data['getClass'] = ClassModel::getClass();
        $data['header_title'] = 'Add Student';
        return view('admin.student.add', $data);
    }

    public function insert(Request $request)
    {

        $request->validate([
            'admission_number' => 'max:50',
            'roll_number' => 'max:50',
            'caste' => 'max:50',
            'religion' => 'max:50',
            'mobile_number' => 'max:15|min:7',
            'blood_group' => 'max:10',
            'height' => 'max:10',
            'weight' => 'max:10',
            'email' => 'required|email|unique:users',
        ]);

        $student = new User;
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->admission_number = trim($request->admission_number);
        $student->roll_number = trim($request->roll_number);
        $student->gender = trim($request->gender);
        if(!empty($request->date_of_birth)){
            $student->class_id = trim($request->date_of_birth);
        }
        $student->class_id = trim($request->class_id);
        $student->caste = trim($request->caste);
        $student->religion = trim($request->religion);
        $student->mobile_number = trim($request->mobile_number);

        if(!empty($request->admission_date)){
            $student->admission_date = trim($request->admission_date);
        }

        if(!empty($request->file('profile_pic')))
        {
            $file = $request->file('profile_pic');
            $extension = $file->getClientOriginalExtension();
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$extension;
            $file->move('upload/profile/', $filename);
            $student->profile_pic = $filename;
        }
        $student->blood_group = trim($request->blood_group);
        $student->height = trim($request->height);
        $student->weight = trim($request->weight);
        $student->email = trim($request->email);
        $student->password = trim($request->password);
        $student->user_type = 3;
        $student->save();

        return redirect('admin/student/list')->with('success', 'Student Added Successfully');
    }

}
