<?php

namespace App\Http\Controllers;

use App\Models\SubjectModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{

    public function list()
    {
        $data['getRecord'] = SubjectModel::getRecord();
        $data['header_title'] = 'Subject List';
        return view('admin.subject.list', $data);
    }

    public function add()
    {
        $data['header_title'] = 'Add Subject';
        return view('admin.subject.add', $data);
    }

    public function insert(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        // ]);
            $save = new SubjectModel;
            $save->name = $request->name;
            $save->type = $request->type;
            $save->status = $request->status;
            $save->created_by = Auth()->user()->id;
            $save->save();

            return redirect('admin/subject/list')->with('success', 'Subject Added Successfully');
    }

    public function edit($id)
    {
        $data['getRecord'] = SubjectModel::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title'] = 'Edit Subject';
            return view('admin.subject.edit', $data);
        }
        else
        {
            abort(404);
        }

    }

}
