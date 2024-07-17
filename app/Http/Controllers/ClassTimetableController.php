<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;

class ClassTimetableController extends Controller
{
    public function list()
    {
        $getClass = ClassModel::all()->where('is_delete','=',0)->where('status','=',0);
        $data = compact('getClass');
        return view('admin.class_timetable.list')->with($data);
        
    }

    public function get_subject(Request $request) {
        $getSubject = ClassSubjectModel::MySubject($request->class_id);
        $html = "<option value=''> Select</option>";
        foreach($getSubject as $value){
            $html = "<option value='".$value->subject_id."'>".$value->subject_name."></opttion>";

        }   
        $json['html'] = $html;
        echo json_encode(value);         
    }
}

   
