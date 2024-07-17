<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;
class SubjectModel extends Model
{
    use HasFactory; 
    protected $table = 'subject';
    protected $primarykey = 'id';

    static public function getRecord()
    {
        $query = self::select('subject.*', 'users.name as Created_by_Name')
        ->join('users', 'users.id', '=', 'subject.created_by');

        if(!empty(Request::get('name'))){
            $query = $query->where('subject.name','like','%'.Request::get('name').'%');
        }

        
        if(!empty(Request::get('type'))){
            $query = $query->where('subject.type','like','%'.Request::get('type').'%');
        }


         if(!empty(Request::get('date'))){
                $query = $query->whereDate('subject.created_at','like','%'.Request::get('date').'%');
            }


        $query = $query->where('subject.is_delete', '=', 0)
        ->orderBy('subject.id', 'desc')
        ->paginate(3);

        return $query;
    }

    static public function getSingle($id)
    {
       return self::find($id);   
    }


    //this function is not working and i used this function for get all the subject from the subject table for assign the subject to  the class 

    static public function getSubject()
    {
       return self::select('subject.*')->where('is_delete','=',0)->where('status','=',0)->get();
    }

    

}
