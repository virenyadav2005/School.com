<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\ExamModel;
use App\Models\ClassModel;
use App\Models\ClassSubjectModel;

class ExaminationController extends Controller
{
        public function exam_list()
        {
            $getRecord = ExamModel::getRecord();
            $data = compact('getRecord');
            return view('admin.examination.exam.list')->with($data);
        }


        public function exam_add()
        {
            $getRecord = ExamModel::getRecord();
            $data = compact('getRecord');
            return view('admin.examination.exam.add')->with($data);
        }

        public function exam_insert(Request $request)
        {
            $exam = new ExamModel;
            $exam->name = trim($request->name);
            $exam->note = trim($request->note);
            $exam->created_by = Auth::user()->id;
            $exam->save();

            return redirect('admin/examination/exam/list')->with('success',"Exam Successfully Created");

        }



        public function exam_edit($id){
            $id = ExamModel::getSingle($id);
            if(!empty($id)){
            $data = compact('id');
            return view('admin.examination.exam.edit')->with($data);
            }
            else{
                abort(404);
            }   
        }



        public function exam_update(Request $req,$id){
            $id = ExamModel::getSingle($id);
            $id->name=trim($req->name);
            $id->note = trim($req->note);
            $id->save();
            return redirect('admin/examination/exam/list')->with("success","Exam Updated successfully!");
        }

        
        
        public function exam_delete($id){
            $getRecord = ExamModel::getSingle($id);
            if(!empty($getRecord)){
                $getRecord->is_delete = 1;
                $getRecord->save();
            
            return redirect()->back()->with('error',"Successfully Deleted Exam Details");
            }
            else{
                abort(404);
            }   
        }




        public function exam_schedule(Request $request){
            $getClass = ClassModel::all()->where('is_delete','=',0)->where('status','=',0);
            $getExam = ExamModel::getExam();

            $result = array();
            if(!empty($request->get('exam_id')) && !empty($request->get('class->id'))){
                $getSubject = ClassSubjectModel::MySubject($request->get('class->id'));
                foreach($getSubject as $Value)
                {
                    $dataS = array();
                    $dataS['subject_id'] = $value->subject_id;
                    $dataS['class_id'] = $value->class_id;
                    $dataS['subject_name'] = $value->subject_name;
                    $dataS['subject_type'] = $value->subject_type;
                    $dataS['class_name'] = $value->class_name;
                    $result[] = $dataS;
                }
            }
            $data = compact('getClass','getExam');
            return view('admin.examination.exam_schedule')->with($data);
        }

        
    }


