<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;
use Str;

class TeacherController extends Controller
{
    public function list(){

        $getRecord = User::getTeacher();
        $data = compact('getRecord');
        return view('admin.teacher.list')->with($data);
    }


    public function add(){
        return view('admin.teacher.add');
    }

    public function insert(Request $req)
    {

        $teacher = new User;
        $teacher->name = $req->name;
        $teacher->last_name = $req->last_name;
        $teacher->gender = $req->gender;
        $teacher->date_of_birth = $req->date_of_birth;
        $teacher->date_of_joining = $req->date_of_joining;
        $teacher->qualification = $req->qualification;
        $teacher->work_experience = $req->work_experience;
        $teacher->work_experience_detail = $req->work_experience_detail;
        $teacher->mobile_number = $req->mobile_number;

        if(!empty($req->file('profile_pic'))){
            $ext = $req->file('profile_pic')->getClientOriginalExtension();
            $file = $req->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/',$filename);
            $teacher->profile_pic = $filename;
        }
        $teacher->current_address = $req->current_address;
        $teacher->permanent_address = $req->permanent_address;
        $teacher->note = $req->note;
        $teacher->email = $req->email;
        $teacher->status = $req->status;
        $teacher->user_type = 2;
        $teacher->password = Hash::make($req->password);

        $teacher->save();

        return redirect('admin/teacher/list')->with('success',"Teacher Successfully Created");

    }

    public function Edit($id)
    {

        $getRecord = User::getSingle($id);
        if(!empty($getRecord)){
            $data = compact('getRecord');
            return view('admin.teacher.edit')->with($data);
        }
        else{
            abort(404);
        }
        
    }

    public function Update($id,Request $req)
    {


        $req->validate([
            'email' => 'required|email|unique:users,email,'.$id,
             'password' => 'required|max:15|min:6',
        ]);
        $teacher = User::getSingle($id);

        $teacher->name = trim($req->name);
        $teacher->last_name = trim($req->last_name);
        $teacher->gender = trim($req->gender);
        $teacher->date_of_birth = trim($req->date_of_birth);
        $teacher->date_of_joining = trim($req->date_of_joining);
        $teacher->qualification = $req->qualification;
        $teacher->work_experience = trim($req->work_experience);
        $teacher->work_experience_detail = trim($req->work_experience_detail);
        $teacher->mobile_number = trim($req->mobile_number);

        if(!empty($req->file('profile_pic'))){

        if(!empty($teacher->getProfile())){
            unlink('upload/profile/'.$teacher->profile_pic);
        }
        $ext = $req->file('profile_pic')->getClientOriginalExtension();
        $file = $req->file('profile_pic');
        $randomStr = date('Ymdhis').Str::random(20);
        $filename = strtolower($randomStr).'.'.$ext;
        $file->move('upload/profile/',$filename);
        $teacher->profile_pic = $filename;
    }
        $teacher->current_address = $req->current_address;
        $teacher->permanent_address = $req->permanent_address;
        $teacher->note = $req->note;
        $teacher->email = trim($req->email);
        $teacher->status = trim($req->status);
        $teacher->user_type = 2;
        $teacher->password = Hash::make($req->password);

        $teacher->save();

        return redirect('admin/teacher/list')->with('success',"Teacher Successfully Updated");
        
    }


    public function Delete($id)
    {
        $teacher = User::getSingle();
        $teacher->is_delete = 1;
        $teacher->save();

        return redirect('admin/teacher/list')->with('error',"Teacher Successfully Deleted");
        
    }
}
