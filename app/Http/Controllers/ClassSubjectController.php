<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\ClassSubjectModel;
use App\Models\SubjectModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassSubjectController extends Controller
{
    public function list(Request $request)
    {
        $data['getRecord'] = ClassSubjectModel::getRecord();
        $data['header_title'] = 'Subject Assign List';
        return view('admin.assign_subject.list', $data);
    }

    public function add(Request $request)
    {
        $data['getClass'] = ClassModel::getClass();
        $data['getSubject'] = SubjectModel::getSubject();
        $data['header_title'] = 'Subject Assign Add';
        return view('admin.assign_subject.add', $data);
    }

    public function insert(Request $request)
    {
        // $request->validate([
        //     'class_id' => 'required',
        //     'subject_id' => 'required',
        // ]);
        if(!empty($request->subject_id))
        {
            foreach($request->subject_id as $subject_id)
            {
                $countAlready = ClassSubjectModel::countAlready($request->class_id, $subject_id);
                if(!empty($countAlready))
                {
                    $countAlready->status = $request->status;
                    $countAlready->save();
                }
                else
                {
                    $save = new ClassSubjectModel;
                $save->class_id = $request->class_id;
                $save->subject_id = $subject_id;
                $save->status = $request->status;
                $save->created_by = Auth()->user()->id;
                $save->save();
                }

            }
            return redirect('admin/assign_subject/list')->with('success', 'Subject assign successfully');
        }
        else
        {
            return redirect()->back()->with('error', 'Please try again');
        }

    }
}
