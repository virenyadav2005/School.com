<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;
use Str;

class ParentController extends Controller
{
    public function list()
    {
        $getRecord = User::getParent();
        $data = compact('getRecord');
        return view('admin.parent.list')->with($data);
        
    }

    public function add()
    {
        // $getClass = ClassModel::all();
        // $data = compact('getClass');
        return view('admin.parent.add');
    }

    public function insert(Request $req)
    {

        $req->validate([
            'email' => 'required|email|unique:users',
            'mobile_number' =>'string|max:14|min:10',
            'gender' => 'required|in:Male,Female,Other',
            'occupation' => 'max:255',
            'address' => 'max:255',
            'password' => 'string|min:6'

        ]);

        $parent = new User;
        $parent->name = $req->name;
        $parent->last_name = $req->last_name;
        $parent->gender = $req->gender;
        $parent->occupation = $req->occupation;
        $parent->address = $req->address;
        $parent->mobile_number = $req->mobile_number;
        if(!empty($req->file('profile_pic'))){
            $ext = $req->file('profile_pic')->getClientOriginalExtension();
            $file = $req->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/',$filename);
            $parent->profile_pic = $filename;
        }
        $parent->status = $req->status;
        $parent->user_type = 4;
        $parent->email = $req->email;
        // $parent->note = 'null';
        $parent->password = Hash::make($req->password);
        $parent->save();

        return redirect('admin/parent/list')->with('success',"Parent Successfully Created");
        
    }

    public function Edit($id)
    {
        $getRecord = User::getSingle($id);
        if(!empty($getRecord)){
        $data = compact('getRecord');
        return view('admin.parent.edit')->with($data);
        }
        else{
            abort(404);
        }
        
    }

    public function Update($id,Request $req)
    {

        $req->validate([
            'email' => 'required|email|unique:users,email,'.$id,
            'mobile_number' =>'string|max:14|min:10',
            'gender' => 'required|in:Male,Female,Other',
            'occupation' => 'max:255',
            'address' => 'max:255',

        ]);


    $save = User::getsingle($id);
    $save->name = trim($req->name);
    $save->last_name = trim($req->last_name);
    $save->gender = trim($req->gender);
    $save->occupation = trim($req->occupation);
    $save->address = trim($req->address);
    $save->mobile_number = trim($req->mobile_number);
    if(!empty($req->file('profile_pic'))){

        if(!empty($save->getProfile())){
            unlink('upload/profile/'.$save->profile_pic);
        }
        $ext = $req->file('profile_pic')->getClientOriginalExtension();
        $file = $req->file('profile_pic');
        $randomStr = date('Ymdhis').Str::random(20);
        $filename = strtolower($randomStr).'.'.$ext;
        $file->move('upload/profile/',$filename);
        $save->profile_pic = $filename;
    }
    $save->status = trim($req->status);
    $save->email = trim($req->email);
    $save->status = trim($req->status);
    if(!empty($req->password)){
    $save->password = Hash::make($req->password);
    }
    $save->user_type = 4;
    $save->save();
    return redirect('admin/parent/list')->with('success',"Parent Successfully Updated");
    
}

public function delete($id)
{
    $getRecord = User::getSingle($id);
    if(!empty($getRecord))
    {
        $getRecord->is_delete = 1;
        $getRecord->save();
        return redirect()->back()->with('error','Parent Successfully Deleted');
    }
    else{
        return redirect()->back()->with('error','Something went wrong');

    }
        
    }


    public function myStudent($id)
    {
        $getParent = User::getSingle($id);
        $parent_id = $id;
        $getSearchStudent = User::getSearchStudent();
        $getMyStudent = User::getMyStudent($parent_id);
        $data = compact('getSearchStudent','parent_id','getMyStudent','getParent');
        return view('admin.parent.my_student')->with($data);
        
    }

    public function assignStudentParent($student_id,$parent_id)
    {
        $student = User::getSingle($student_id);
        $student->parent_id = $parent_id;
        $student->save();
        return redirect()->back()->with('success',' Student Successfully Assign  to Parent ');
    }

    public function assignStudentParentDelete($student_id)
    {
        $student = User::getSingle($student_id);
        $student->parent_id = null;
        $student->save();

        return redirect()->back()->with('error',"Assigned Student Successfully Deleted");        
    }


    //parent part

    public function myStudentParent()
    {
        $id = Auth::user()->id;
        $getMyStudent = User::getMyStudent($id);
        $data = compact('getMyStudent');
        return view('parent.my_student')->with($data);        
    }
}
