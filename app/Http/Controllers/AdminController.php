<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;

class AdminController extends Controller
{

    public function MyAccount()
    {
        $getData = User::getSingle(Auth::user()->id);
        $data = compact('getData');
        return view('admin.my_account')->with($data);
        
    }

    public function UpdateMyAccountAdmin(Request $req)
    {
        $id = Auth::user()->id;

        $req->validate([
            'email' => 'required|email|unique:users,email,'.$id,
        ]);
        
        $admin = User::getSingle($id);
        $admin->name = trim($req->name);
        $admin->email =  trim($req->email);
        $admin->save();

        return redirect()->back()->with('success',"Account Successfully Updated");
        
    }
    public function list()
    {

        $getRecord = User::getAdmin();
        $data = compact('getRecord');
        return view('admin.admin.list')->with($data);
    }
    public function add()
    {
        return view('admin.admin.add');
    }
    public function insert(Request $req)
    {

        $req->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
        ]);
        
        $user = new User();

        $user->name = trim($req->name);
        $user->email = trim($req->email);
        $user->password = Hash::make($req->mame);
        $user->user_type = 1;
        $user->save();

        return redirect('admin/admin/list')->with('success','Admin successfully created');
    }

    public function Edit($id)
    {
        $getData = User::getSingle($id);
        $data = compact('getData');

        if(!empty($data)){
        // dd($data);
       return view('admin.admin.edit')->with($data);
        }
        else{
            abort(404);
        }

    }

    public function Update($id, Request $req)
    {

        $req->validate([
            'email' => 'required|email|unique:users,email,'.$id,
        ]);
        $user = User::getSingle($id);

        $user->name = trim($req->name);
        $user->email = trim($req->email);
        if(!empty($user->password)){
        $user->password = Hash::make($req->mame);
        }
        $user->user_type = 1;
        $user->save();

        return redirect('admin/admin/list')->with('success','Admin successfully Updated');
    }

    public function Delete($id)
    {
        $user = User::getSingle($id);
        $user->is_delete = 1;
        $user->save();
        return redirect('admin/admin/list')->with('error','Admin Successfully Deleted');
    }

}

