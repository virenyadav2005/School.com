    <?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\User;
use App\Models\AssignClassTeacherModel;
use Auth;

class AssignClassTeacherController extends Controller
{
    public function list(Request $req)
    {
        $getRecord = AssignClassTeacherModel::getRecord();
        $data = compact('getRecord');
     return view('admin.assign_class_teacher.list')->with($data);   
    }

    public function add()
    {
        //classes lene ke liye sari for assign the subjects to a class
        $getClass = ClassModel::all()->where('is_delete','=',0)->where('status','=',0);
        $getTeacher = User::all()->where('user_type','=',2)->where('is_delete','=',0)->where('status','=',0);
        $data = compact('getClass','getTeacher');
        return view('admin.assign_class_teacher.add')->with($data);   
    }

    public function insert(Request $req)
    {
        
        if(!empty($req->teacher_id)){
            foreach ($req->teacher_id  as  $teacher_id ) {

                //same data repeat na ho table m means same class ko same subject assign na ho again iske liye
                $getAlreadyFirst = AssignClassTeacherModel::getAlreadyFirst($req->class_id,$teacher_id);
                if(!empty($getAlreadyFirst)){
                    $getAlreadyFirst->status = $req->status;
                    $getAlreadyFirst->save();
                }
                else{
                    $save =new  AssignClassTeacherModel;
                    $save->class_id = $req->class_id;
                    $save->teacher_id = $teacher_id;
                    $save->status = $req->status;
                    $save->created_by = Auth::user()->id;
                    $save->save();
                }
               
            }
            return redirect('admin/assign_class_teacher/list')->with('success',"Teacher Successfully Assigned to Class");
        }

    }

    public function Edit($id)
    {
        $getRecord = AssignClassTeacherModel::getSingle($id);
        if(!empty($getRecord)){
            
            $getAssignTeacherID = AssignClassTeacherModel::getAssignTeacherID($getRecord->class_id);
            $getClass = ClassModel::all()->where('is_delete','=',0)->where('status','=',0);
            $getTeacher = User::getTeacherClass();
            $data = compact('getClass','getTeacher','getAssignTeacherID','getRecord');
            return view('admin.assign_class_teacher.edit')->with($data);
        
        }
        else{
            abort(404);
        }
        
    }


    public function Update($id,Request $req)
    {
        AssignClassTeacherModel::deleteTeacher($req->class_id);
        if(!empty($req->teacher_id)){
            foreach($req->teacher_id as $teacher_id){
                $getAlreadyFirst = AssignClassTeacherModel::getAlreadyFirst($req->class_id,$teacher_id);
                if(!empty($getAlreadyFirst)){
                    $getAlreadyFirst->status = $req->status;
                    $getAlreadyFirst->save();
                    return redirect('admin/assign_class_teacher/list')->with('success',"Status Successfully Updated"); 
                }
                else{
                    $save = new AssignClassTeacherModel;
                    $save->class_id = $req->class_id;
                    $save->teacher_id = $teacher_id;
                    $save->status = $req->status;
                    $save->created_by = Auth::user()->id;
                    $save->save();
                }
                return redirect('admin/assign_class_teacher/list')->with('success',"Class Teacher Successfully Updated");
                
            }
        }
    }


    public function Edit_single($id)
    {
        $getRecord = AssignClassTeacherModel::getSingle($id);
        if(!empty($getRecord)){
            
            $getClass = ClassModel::all()->where('is_delete','=',0)->where('status','=',0);
            $getTeacher = User::getTeacherClass();
            $data = compact('getClass','getTeacher','getRecord');
            return view('admin.assign_class_teacher.edit_single')->with($data);  
        } 
        
    }


    public function Update_single($id,Request $req)
    {
        $getAlreadyFirst = AssignClassTeacherModel::getAlreadyFirst($req->class_id,$req->teacher_id);
        if(!empty($getAlreadyFirst))
        {
            $getAlreadyFirst->status = $req->status;
            $getAlreadyFirst->save();
            return redirect('admin/assign_class_teacher/list')->with('success',"Status Successfully Updated");
        }
        else
        {
            $save = AssignClassTeacherModel::getSingle($id);
            $save->class_id = $req->class_id;
            $save->teacher_id = $req->teacher_id;
            $save->status = $req->status;
            $save->save();
            return redirect('admin/assign_class_teacher/list')->with('success',"Data successfully Updated");

        }
        
    }

    public function Delete($id)
    {
        $getSingle = AssignClassTeacherModel::getSingle($id);
        $getSingle->is_delete = 1;
        $getSingle->save();
        return redirect('admin/assign_class_teacher/list')->with('error',"SuccessFully Deleted");
    }




    //Teacher side MYClassSubject

    public function MyClassSubject()
    {
        $getRecord = AssignClassTeacherModel::getMyClassSubject(Auth::user()->id);
        $data = compact('getRecord');
        
        return view('teacher.my_class_subject')->with($data);
    }


}
