<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    public function dashboard() {
        if(Auth::user()->user_type == 1){
        return view('admin.dashboard');
        }
        if(Auth::user()->user_type == 2){
        return view('teacher.dashboard');
        }
        if(Auth::user()->user_type == 3){
        return view('student.dashboard');
        }
        if(Auth::user()->user_type == 4){
        return view('parent.dashboard');
        }
    }

}
