<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{

    public function list()
    {
        $data['header_title'] = 'Class List';
        return view('admin.class.list', $data);
    }


    public function add()
    {
        $data['header_title'] = 'Add Class';
        return view('admin.class.add', $data);
    }

    public function insert(Request $request)
    {
        $save = new ClassModel;
        $save->name = $request->name;
        $save->status = $request->status;
        $save->created_by = Auth::user()->id;
        $save->save();
        return redirect('/admin/class/list')->with('success', 'Class Added Successfully');
    }
}
