<?php

namespace App\Http\Controllers;
// use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;
use App\Models\subjectModel;
use App\Models\ClassSubjectModel;
use App\Models\User;
use App\Models\ClassModel;
use Auth;

class SubjectController extends Controller
{
    public function list()
    {
         $getRecord = SubjectModel::getRecord();
         $data = compact('getRecord');
        return view('admin.subject.list')->with($data);
        
    }

    public function add()
    {
        return view('admin.subject.add');
        
    }

    public function insert(Request $req)
    {
        // dd($req->all());
        $subData = new  SubjectModel;
        $subData->name = $req->name;
        $subData->type = $req->type;
        $subData->created_by = Auth::User()->id;
        $subData->status = $req->status;
        $subData->save();

        return redirect('admin/subject/list')->with('success',"Subject Successfully Created");
    }

    public function Edit($id)
    {
        $data = SubjectModel::getSingle($id);
        $getId = compact('data');
        if(!empty($getId)){
            return view('admin.subject.edit')->with($getId);
        }
        else{
            abort(404);
        }
        
    }

    public function Update($id,Request $req)
    {
        $subData = SubjectModel::getSingle($id);

        $subData->name = trim($req->name);
        $subData->type = trim($req->type);
        $subData->status = $req->status;
        $subData->save();

        return redirect('admin/subject/list')->with('success',"Successfully Updated");

    }

    public function Delete($id)
    {
        $data = SubjectModel::getSingle($id);
        $data->is_delete = 1;
        $data->save();

        return redirect('admin/subject/list')->with('error',"Data Successfully Deleted");
    }


    // student part

    public function MySubject()
    {
        $id = Auth::user()->class_id;
        $getRecord = ClassSubjectModel::MySubject($id);
        $data = compact('getRecord');
        return view('student.my_subject')->with($data);   
        
    }

    //parent side 
    
    public function ParentStudentSubject($subject_id)
    {
        $student = User::getSingle($subject_id);
        $getRecord = ClassSubjectModel::MySubject($student->class_id);
        $data = compact('getRecord','student');
        return view('parent.my_subject')->with($data);
        
    }

}
