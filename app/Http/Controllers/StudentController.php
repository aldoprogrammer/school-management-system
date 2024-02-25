<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Builder\Class_;

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
        $student->admission_date = trim($request->admission_date);
        $student->profile_pic = trim($request->profile_pic);
        $student->blood_group = trim($request->blood_group);
        $student->height = trim($request->height);
        $student->weight = trim($request->weight);
        $student->email = trim($request->email);
        $student->password = trim($request->password);
        $student->save();

        return redirect('admin/student/list')->with('success', 'Student Added Successfully');
    }

}
