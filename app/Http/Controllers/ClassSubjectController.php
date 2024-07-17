<?php

namespace App\Http\Controllers;
use App\Models\ClassSubjectModel;
use App\Models\ClassModel;
use App\Models\SubjectModel;
use Auth;

use Illuminate\Http\Request;

class ClassSubjectController extends Controller
{
    public function list(Request $req)
    {
        $getRecord = ClassSubjectModel::getRecord();
        $data = compact('getRecord');
     return view('admin.assign_subject.list')->with($data);   
    }

    public function add()
    {
        //classes lene ke liye sari for assign the subjects to a class
        $getClass = ClassModel::all()->where('is_delete','=',0)->where('status','=',0);
        //subjects lene ke liye sari for assign the subjects to a class
        $getSubject = SubjectModel::all()->where('is_delete','=',0)->where('status','=',0);
        $data = compact('getClass','getSubject');
        return view('admin.assign_subject.add')->with($data);   
    }

    public function insert(Request $req)
    {
        if(!empty($req->subject_id)){
            foreach ($req->subject_id  as  $subject_id ) {

                //same data repeat na ho table m means same class ko same subject assign na ho again iske liye
                $getAlreadyFirst = ClassSubjectModel::getAlreadyFirst($req->class_id,$subject_id);
                if(!empty($getAlreadyFirst)){
                    $getAlreadyFirst->status = $req->status;
                    $getAlreadyFirst->save();
                }
                else{
                    $save =new  ClassSubjectModel;
                    $save->class_id = $req->class_id;
                    $save->subject_id = $subject_id;
                    $save->status = $req->status;
                    $save->created_by = Auth::user()->id;
                    $save->save();
                }
               
            }
            return redirect('admin/assign_subject/list')->with('success',"Subjects Successfully Assigned to Class");
        }
        else{
            return redirect()->back()->with('error',"Due to some error, Please try again");        }
    }


    public function Edit($id)
    {
        $getRecord = ClassSubjectModel::getSingle($id);
        if(!empty($getRecord)){
            
            $getAssignSubjectID = ClassSubjectModel::getAssignSubjectID($getRecord->class_id);
            $getClass = ClassModel::all()->where('is_delete','=',0)->where('status','=',0);
            $getSubject = SubjectModel::all()->where('is_delete','=',0)->where('status','=',0);
            $data = compact('getClass','getSubject','getAssignSubjectID','getRecord');
            return view('admin.assign_subject.edit')->with($data);
        
        }
        else{
            abort(404);
        }

        
        
    }


  

    public function Update($id,Request $req)
    {
        ClassSubjectModel::deleteSubject($req->class_id);
        if(!empty($req->subject_id)){
            foreach($req->subject_id as $subject_id){
                $getAlreadyFirst = ClassSubjectModel::getAlreadyFirst($req->class_id,$req->subject_id);
                if(!empty($getAlreadyFirst)){
                    $getAlreadyFirst->status = $req->status;
                    $getAlreadyFirst->save();
                }
                else{
                    $save = new ClassSubjectModel;
                    $save->class_id = $req->class_id;
                    $save->subject_id = $subject_id;
                    $save->status = $req->status;
                    $save->created_by = Auth::user()->id;
                    $save->save();
                }
                
            }
        }
        return redirect('admin/assign_subject/list')->with('success',"Data Successfully Updated");
}


    public function Edit_single($id)
    {
        $getRecord = ClassSubjectModel::getSingle($id);
        if(!empty($getRecord)){
            
            $getClass = ClassModel::all()->where('is_delete','=',0)->where('status','=',0);
            $getSubject = SubjectModel::all()->where('is_delete','=',0)->where('status','=',0);
            $data = compact('getClass','getSubject','getRecord');
            return view('admin.assign_subject.edit_single')->with($data);  
        } 
        
    }

    public function Update_single($id,Request $req)
    {
        $getAlreadyFirst = ClassSubjectModel::getAlreadyFirst($req->class_id,$req->subject_id);
        if(!empty($getAlreadyFirst))
        {
            $getAlreadyFirst->status = $req->status;
            $getAlreadyFirst->save();
            return redirect('admin/assign_subject/list')->with('success',"Status Successfully Updated");
        }
        else
        {
            $save = ClassSubjectModel::getSingle($id);
            $save->class_id = $req->class_id;
            $save->subject_id = $req->subject_id;
            $save->status = $req->status;
            $save->save();
            return redirect('admin/assign_subject/list')->with('success',"Data successfully Updated");

        }
        
    }


        
    

    public function Delete($id)
    {
        $getSingle = ClassSubjectModel::getSingle($id);
        $getSingle->is_delete = 1;
        $getSingle->save();

        return redirect('admin/assign_subject/list')->with('error',"SuccessFully Deleted");
        
    }


}
