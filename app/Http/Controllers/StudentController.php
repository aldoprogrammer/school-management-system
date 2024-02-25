<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getStudent();
        $data['header_title'] = 'Student List';
        return view('admin.student.list', $data);
    }

}
