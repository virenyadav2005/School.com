<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ClassModel;
// use App\Http\Requests\StudentProfileUpdateRequest;
use Auth;
use Hash;
use Str;

class StudentController extends Controller
{
    public function list()
    {
        $getRecord = User::getStudent();
        $data = compact('getRecord');
        return view('admin.student.list')->with($data);
        
    }

    public function add()
    {
        $getClass = ClassModel::all()->where('is_delete','=',0)->where('status','=',0);
        $data = compact('getClass');
        return view('admin.student.add')->with($data);
        
    }

    public function insert(Request $req)
    {

        $req->validate([

            // 'name' => 'required|string|max:255',
            // 'last_name' => 'required|string|max:255',
            // 'roll_number' => 'required|string|max:20',
            // 'class' => 'required|string|max:50',
            // 'gender' => 'required|in:Male,Female,Other',
            // 'date_of_birth' => 'required|date',
            // 'email' => 'required|email|unique:users,email',
            // 'password' => 'required',
            // 'height' => 'nullable|numeric|min:0',
            // 'weight' => 'nullable|numeric|min:0',
            // 'blood_group' => 'in:A,B,AB,O',
            // 'caste' => 'nullable|string|in:Brahmin,Kshatriya,Vaishya,Shudra',
            // 'religion' => 'nullable|string|in:Hindu,Muslim,Christian,Sikh',
            // 'mobile_number' => 'required|regex:/^\d{10}$/',

        ]);
        $save = new User;
        $save->name = trim($req->name);
        $save->last_name = trim($req->last_name);
        $save->admission_number = trim($req->admission_number);
        $save->roll_number = trim($req->roll_number);
        $save->class_id = trim($req->class_id);
        $save->gender = trim($req->gender);
        $save->date_of_birth = trim($req->date_of_birth);
        $save->caste = trim($req->caste);
        $save->religion = trim($req->religion);
        $save->mobile_number = trim($req->mobile_number);
        $save->admission_date = trim($req->admission_date);
        if(!empty($req->file('profile_pic'))){
            $ext = $req->file('profile_pic')->getClientOriginalExtension();
            $file = $req->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/',$filename);
            $save->profile_pic = $filename;
        }
        $save->blood_group = $req->blood_group;
        $save->weight = $req->weight;
        $save->height = $req->height;
        $save->status = trim($req->status);
        $save->email = trim($req->email);
        $save->status = trim($req->status);
        $save->password = Hash::make($req->password);
        $save->user_type = 3;
        $save->save();
       return redirect('admin/student/list')->with('success',"Student Successfully Created");
        
    }


public function Edit($id)
{
    $getRecord = User::getSingle($id);
    if(!empty($getRecord)){
    $getClass = ClassModel::all();
    $data = compact('getRecord','getClass');
    return view('admin.student.edit')->with($data);
    }
    else{
        abort(404);
    }
}

public function Update($id,Request $req )
{
    //  $req->validate([
    //     'email' => 'required|email|unique:users,email,'.$id, // Adjust the unique rule to your User model's table
    // 'name' => 'required|string|max:255',
    // 'last_name' => 'required|string|max:255',
    // 'roll_number' => 'required|string|max:20',
    // 'class' => 'required|string|max:50',
    // 'gender' => 'required|in:Male,Female,Other',
    // 'date_of_birth' => 'required|date',
    // 'height' => 'min:0',
    // 'weight' => 'min:0',
    // 'blood_group' => 'in:A,B,AB,O',
    // 'caste' => 'string|in:Brahmin,Kshatriya,Vaishya,Shudra',
    // 'religion' => 'string|in:Hindu,Muslim,Christian,Sikh',
    // ]);
    $save = User::getsingle($id);
    $save->name = trim($req->name);
    $save->last_name = trim($req->last_name);
    $save->admission_number = trim($req->admission_number);
    $save->roll_number = trim($req->roll_number);
    $save->class_id = trim($req->class_id);
    $save->gender = trim($req->gender);
    $save->date_of_birth = trim($req->date_of_birth);
    $save->caste = trim($req->caste);
    $save->religion = trim($req->religion);
    $save->mobile_number = trim($req->mobile_number);
    $save->admission_date = trim($req->admission_date);
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
    $save->blood_group = $req->blood_group;
    $save->weight = $req->weight;
    $save->height = $req->height;
    $save->status = trim($req->status);
    $save->email = trim($req->email);
    $save->status = trim($req->status);
    if(!empty($req->password)){
    $save->password = Hash::make($req->password);
    }
    $save->user_type = 3;
    $save->save();
    return redirect('admin/student/list')->with('success',"Student Successfully Updated");
    
}

public function delete($id)
{
    $getRecord = User::getSingle($id);
    if(!empty($getRecord))
    {
        $getRecord->is_delete = 1;
        $getRecord->save();
        return redirect()->back()->with('error','Successfully Deleted');
    }
    else{
        return redirect()->back()->with('error','Something went wrong');

    }
                
}


//Teacher side MyStudent
public function MyStudent()
{
    $getRecord = User::getTeacherStudent(Auth::user()->id);
    $data = compact('getRecord');
    return view('teacher.my_student')->with($data);
    
}


}

    

