<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;
use Str;


class UserController extends Controller
{
    public function MyAccount()
    {
        $getRecord = User::getSingle(Auth::user()->id);
        $data = compact('getRecord');

        if(Auth::user()->user_type == 2){
            return view('teacher.my_account')->with($data);
        }
        if(Auth::user()->user_type == 3){
            return view('student.my_account')->with($data);
        }
        if(Auth::user()->user_type == 4){
            return view('parent.my_account')->with($data);
        }
    
    }

    public function UpdateMyAccount(Request $req)
    {
        $id = Auth::user()->id;
        if(Auth::user()->user_type == 2){
                $req->validate([
                    'email' => 'required|email|unique:users,email,'.$id,                
                ]);


                $teacher = User::getSingle($id);
                $teacher->name = trim($req->name);
                $teacher->last_name = trim($req->last_name);
                $teacher->gender = trim($req->gender);
                $teacher->date_of_birth = trim($req->date_of_birth);
                $teacher->qualification = $req->qualification;
                $teacher->work_experience = trim($req->work_experience);
                $teacher->work_experience_detail = $req->work_experience_detail;
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
                $teacher->email = trim($req->email);
                $teacher->user_type = 2;
                $teacher->save();

                return redirect('/teacher/account')->with('success',"Teacher Successfully Updated");
        }


        if(Auth::user()->user_type == 3)
        {
            $req->validate([

                'email' => 'required|email|unique:users,email,'.$id,
                'caste' => 'nullable|string|in:Brahmin,Kshatriya,Vaishya,Shudra',
                'religion' => 'nullable|string|in:Hindu,Muslim,Christian,Sikh',
    
            ]);

            $save = User::getsingle($id);
            $save->name = trim($req->name);
            $save->last_name = trim($req->last_name);
            $save->gender = trim($req->gender);
            $save->date_of_birth = trim($req->date_of_birth);
            $save->caste = trim($req->caste);
            $save->religion = trim($req->religion);
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
            $save->blood_group = $req->blood_group;
            $save->weight = $req->weight;
            $save->height = $req->height;
            $save->email = trim($req->email);
            $save->user_type = 3;
            $save->save();
            return redirect()->back()->with('success',"Student Successfully Updated");
        }


        if(Auth::user()->user_type == 4)
        {
            $req->validate([
                'email' => 'required|email|unique:users,email,'.$id,
            ]);
    
    
        $save = User::getsingle($id);
        $save->name = $req->name;
        $save->last_name = $req->last_name;
        $save->gender = trim($req->gender);
        $save->occupation = $req->occupation;
        $save->address = $req->address;
        $save->mobile_number = $req->mobile_number;
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
        $save->email = trim($req->email);
        $save->user_type = 4;
        $save->save();
        return redirect()->back()->with('success',"Parent Successfully Updated");

        }
        
    }

    public function change_password()
    {
        return view('profile.change_password');
        
    }

    public function update_change_password(Request $req)
    {
        $user = User::getSingle(Auth::user()->id);
        if(Hash::check($req->new_password,$user->password)){
            return redirect()->back()->with('error',"Please Enter New Password");
        }
        else if(Hash::check($req->old_password,$user->password)){
            $user->password = Hash::make($req->new_password);
            $user->save();
            return redirect()->back()->with('success',"Password Successfully Updated");
        } 
        else{
            return redirect()->back()->with('error',"Old Passwoord is not Correct");
        }
        
    }
}
