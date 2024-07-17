<?php

namespace App\Http\Controllers;
use App\Models\ClassModel;
use Auth;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function list()
    {
        $getRecord = ClassModel::getRecord();
        $data = compact('getRecord');
        return view('admin.class.list')->with($data);
    }
    public function add()
    {
        return view('admin.class.add');
    }

    public function insert(Request $req){


        $req->validate([
            'name' => 'required',
            'status' => 'required'
        ]);

        $save = new ClassModel;
        $save->name = $req->name;
        $save->status = $req->status;
        $save->created_by = Auth::user()->id;
        $save->save();


        return redirect('admin/class/list')->with('success',"Class Successfully Created!");
    }

    public function Edit($id){
        $data = ClassModel::getsingle($id);
        $getId = compact('data');

        if(!empty($getId)){
            return view('admin.class.edit')->with($getId);
        }
        else{
            abort(404);
        }
    }

    public function Update($id,Request $req)
    {
        $getData = ClassModel::getsingle($id);

        $getData->name = trim($req->name);
        $getData->status = trim($req->status);
        $getData->save();

        return redirect('admin/class/list')->with('success',"Data Successfully Updated");
        
    }

    public function Delete($id)
    {

        $data = ClassModel::getsingle($id);
        $data->is_delete = 1;
        $data->save();

        return redirect('admin/class/list')->with('error',"Data Successfully Deleted");

    }
    
}
