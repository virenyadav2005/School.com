<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Models\User;
use App\Mail\ForgetMailPassword;
use Mail;
use Str;



class AuthController extends Controller
{
   public function login(){
    //dd(Hash::make(123456));
    
  
    if(!empty(Auth::check())){
       
        
        if(Auth::user()->user_type == 1)
        {
        return redirect('admin/dashboard');
        }

        else if(Auth::user()->user_type == 2)
        {
        return redirect('teacher/dashboard');
        }

        else if(Auth::user()->user_type == 3)
        {
        return redirect('student/dashboard');
        }

        else if(Auth::user()->user_type == 4)
        {
        return redirect('parent/dashboard');
        }
    }
    return view('auth.login');
   }
   public function Authlogin(Request $req){


       
        $remember = !empty($req->remember) ? true : false;
        if(Auth::attempt(['email' => $req->email, 'password' => $req->password],$remember)){
            if(Auth::user()->user_type == 1)
            {
            return redirect('admin/dashboard');
            }

            else if(Auth::user()->user_type == 2)
            {
            return redirect('teacher/dashboard');
            }

            else if(Auth::user()->user_type == 3)
            {
            return redirect('student/dashboard');
            }

            else if(Auth::user()->user_type == 4)
            {
            return redirect('parent/dashboard');
            }
        }
        else{
            return redirect()->back()->with('error','Please enter correct email or password');

        }
    
   }


   public function forgetpassword()
   {
    return view('auth.forget');
   }


   // for forgot password 



//    public function PostForgetPassword(Request $req)
//    {
//     $user = User::getEmailSingle($req->email);
//     if(!empty($user)){
//         $user->remember_token = Str::random(40);
//         $user->save();
//         Mail::to($user->email)->send(new ForgetMailPassword($user));
//         return redirect()->back()->with('success','Please check your mail and reset your password');
//     }
//     else
//     {
//         return redirect()->back()->with('error',"Email is not found in the system , Please provide Correct One");

//     }

//    }

  public function logout() {
        Auth::logout();
        return redirect(url(''));
   }
}
