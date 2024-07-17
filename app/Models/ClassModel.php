<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;
use DB;

class ClassModel extends Model
{
    use HasFactory;
    protected $table = 'class';
    protected $primarykey = 'id';

    static public function getRecord()
    {
       $return = self::select('class.*','users.name as created_by_name')
                    ->join('users','users.id','class.created_by');

                    if(!empty(Request::get('name'))){
                        $return = $return->where('class.name','like','%'.Request::get('name').'%');
                    }

                    if(!empty(Request::get('date'))){
                        $return = $return->whereDate('class.created_at','like','%'.Request::get('date').'%');
                    }

                    $return = $return->where('class.is_delete','=',0)
                    ->orderBy('class.id','desc')
                    ->paginate(3); 

                    return $return;
    }

    static public function getSingle($id)
    {
        return self::find($id);    
    }

    //this function is not working and i used this function for get all the class from the class table for assign the subject to class 

    // static public function getClass()
    // {
    //    return self::select('class.*')
    //                  ->where('is_delete','=',0)
    //                  ->where('status','=',0)
    //                  ->orderBy('name','asc')
    //                  ->get();
    //                 return $return ;
        
    // }


    static public function getClassForAssignSubject(){
        return self::where('is_delete','=',0)->where('status','=',0)->get();
    }
}
