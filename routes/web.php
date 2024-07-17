<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ClassSubjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AssignClassTeacherController;
use App\Http\Controllers\ClassTimeTableController;
use App\Http\Controllers\ExaminationController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[AuthController::class,'login']);
Route::post('/login',[AuthController::class,'AuthLogin']);
Route::get('logout',[AuthController::class,'logout']);
Route::get('forget-password',[AuthController::class,'forgetpassword']);
Route::post('forget-password',[AuthController::class,'PostForgetPassword']);




Route::get('admin/dashboard', function () {
    return view('admin.dashboard');
});

// Route::get('admin/admin/list', function () {
//     return view('admin.admin.list');
// });


Route::group(['middleware' => 'admin'],function(){
    Route::get('/admin/dashboard',[DashboardController::class,'dashboard']);

    Route::get('admin/account',[AdminController::class,'MyAccount']);
    Route::post('admin/account',[AdminController::class,'UpdateMyAccountAdmin']);

    Route::get('/admin/admin/list',[AdminController::class,'list']);
    Route::get('/admin/admin/add',[AdminController::class,'add']);
    Route::post('/admin/admin/add',[AdminController::class,'insert']);
    Route::get('/admin/admin/edit/{id}',[AdminController::class,'Edit']);
    Route::post('/admin/admin/edit/{id}',[AdminController::class,'Update']);
    Route::get('/admin/admin/delete/{id}',[AdminController::class,'Delete']);


    //tacher url's
    Route::get('/admin/teacher/list',[TeacherController::class,'list']);
    Route::get('/admin/teacher/add',[TeacherController::class,'add']);
    Route::post('/admin/teacher/add',[TeacherController::class,'insert']);
    Route::get('/admin/teacher/edit/{id}',[TeacherController::class,'Edit']);
    Route::post('/admin/teacher/edit/{id}',[TeacherController::class,'Update']);
    Route::get('/admin/teacher/delete/{id}',[TeacherController::class,'Delete']);    



    //Student url's
    Route::get('/admin/student/list',[StudentController::class,'list']);
    Route::get('/admin/student/add',[StudentController::class,'add']);
    Route::post('/admin/student/add',[StudentController::class,'insert']);
    Route::get('/admin/student/edit/{id}',[StudentController::class,'Edit']);
    Route::post('/admin/student/edit/{id}',[StudentController::class,'Update']);
    Route::get('/admin/student/delete/{id}',[StudentController::class,'delete']);


    //Parent url's
    Route::get('/admin/parent/list',[ParentController::class,'list']);
    Route::get('/admin/parent/add',[ParentController::class,'add']);
    Route::post('/admin/parent/add',[ParentController::class,'insert']);
    Route::get('/admin/parent/edit/{id}',[ParentController::class,'Edit']);
    Route::post('/admin/parent/edit/{id}',[ParentController::class,'Update']);
    Route::get('/admin/parent/delete/{id}',[ParentController::class,'delete']);
    Route::get('/admin/parent/my_student/{id}',[ParentController::class,'myStudent']);
    Route::get('/admin/parent/assign_student_parent/{student_id}/{parent_id}',[ParentController::class,'assignStudentParent']);
    Route::get('/admin/parent/assign_student_parent_delete/{student_id}',[ParentController::class,'assignStudentParentDelete']);
    

    //class URL's

    Route::get('admin/class/list',[ClassController::class,'list']);
    Route::get('/admin/class/add',[ClassController::class,'add']);
    Route::post('/admin/class/add',[ClassController::class,'insert']);
    Route::get('/admin/class/edit/{id}',[ClassController::class,'Edit']);
    Route::post('/admin/class/edit/{id}',[ClassController::class,'Update']);
    Route::get('admin/class/delete/{id}',[ClassController::class,'Delete']);


    //subject URL's
    
    Route::get('admin/subject/list',[SubjectController::class,'list']);
    Route::get('/admin/subject/add',[SubjectController::class,'add']);
    Route::post('/admin/subject/add',[SubjectController::class,'insert']);
    Route::get('/admin/subject/edit/{id}',[SubjectController::class,'Edit']);
    Route::post('/admin/subject/edit/{id}',[SubjectController::class,'Update']);
    Route::get('admin/subject/delete/{id}',[SubjectController::class,'Delete']);


    //assign_subject
    Route::get('admin/assign_subject/list',[ClassSubjectController::class,'list']);
    Route::get('/admin/assign_subject/add',[ClassSubjectController::class,'add']);
    Route::post('/admin/assign_subject/add',[ClassSubjectController::class,'insert']);
    Route::get('/admin/assign_subject/edit/{id}',[ClassSubjectController::class,'Edit']);
    Route::post('/admin/assign_subject/edit/{id}',[ClassSubjectController::class,'Update']);
    Route::get('admin/assign_subject/delete/{id}',[ClassSubjectController::class,'Delete']);
    Route::get('/admin/assign_subject/edit_single/{id}',[ClassSubjectController::class,'Edit_single']);
    Route::post('/admin/assign_subject/edit_single/{id}',[ClassSubjectController::class,'Update_single']);


    Route::get('admin/class_timetable/list', [ClassTimetableController::class, 'list']);
Route::post('admin/class_timetable/get_subject', [ClassTimetableController::class, 'get_subject'])->name('admin.class_timetable.get_subject');


     
//assign_class_teacher
    Route::get('admin/assign_class_teacher/list',[AssignClassTeacherController::class,'list']);
    Route::get('/admin/assign_class_teacher/add',[AssignClassTeacherController::class,'add']);
    Route::post('/admin/assign_class_teacher/add',[AssignClassTeacherController::class,'insert']);
    Route::get('/admin/assign_class_teacher/edit/{id}',[AssignClassTeacherController::class,'Edit']);
    Route::post('/admin/assign_class_teacher/edit/{id}',[AssignClassTeacherController::class,'Update']);
    Route::get('admin/assign_class_teacher/delete/{id}',[AssignClassTeacherController::class,'Delete']);
    Route::get('/admin/assign_class_teacher/edit_single/{id}',[AssignClassTeacherController::class,'Edit_single']);
    Route::post('/admin/assign_class_teacher/edit_single/{id}',[AssignClassTeacherController::class,'Update_single']);



    //Change Password
    Route::get('/admin/change_password',[UserController::class,'change_password']);
    Route::post('/admin/change_password',[UserController::class,'update_change_password']);


    
   
    //Examination

    //Exam_List
    Route::get('admin/examination/exam/list',[ExaminationController::class,'exam_list']);
    Route::get('admin/examination/exam/add',[ExaminationController::class,'exam_add']);
    Route::post('admin/examination/exam/add',[ExaminationController::class,'exam_insert']);
    Route::get('admin/examination/exam/edit/{id}',[ExaminationController::class,'exam_edit']);
    Route::post('admin/examination/exam/edit/{id}',[ExaminationController::class,'exam_update']);
    Route::get('admin/examination/exam/delete/{id}',[ExaminationController::class,'exam_delete']);

   
    //Exam_Schedule
    Route::get('admin/examination/exam_schedule',[ExaminationController::class,'exam_schedule']);
    
});

Route::group(['middleware' => 'teacher'],function(){
    Route::get('/teacher/dashboard',[DashboardController::class,'dashboard']);


    
    Route::get('teacher/my_student',[StudentController::class,'MyStudent']);
    Route::get('teacher/my_class_subject',[AssignClassTeacherController::class,'MyClassSubject']);

    
    //my account
    Route::get('/teacher/account',[UserController::class,'MyAccount']);
    Route::post('/teacher/account',[UserController::class,'UpdateMyAccount']);
    //Change Password
    Route::get('/teacher/change_password',[UserController::class,'change_password']);
    Route::post('/teacher/change_password',[UserController::class,'update_change_password']);
});





Route::group(['middleware' => 'student'],function(){
    Route::get('/student/dashboard',[DashboardController::class,'dashboard']);
    //my subject
    Route::get('student/my_subject',[SubjectController::class,'MySubject']);

    //my account 

    Route::get('/student/account',[UserController::class,'MyAccount']);
    Route::post('/student/account',[UserController::class,'UpdateMyAccount']);


    //Change Password
    Route::get('/student/change_password',[UserController::class,'change_password']);
    Route::post('/student/change_password',[UserController::class,'update_change_password']);
});






Route::group(['middleware' => 'parent'],function(){
    Route::get('/parent/dashboard',[DashboardController::class,'dashboard']);


    //my_student
    Route::get('parent/my_student',[ParentController::class,'myStudentParent']);
    //my-subject
    
    Route::get('parent/my_student/subject/my_subject/{student_id}',[SubjectController::class,'ParentStudentSubject']);

    //my account
    Route::get('/parent/account',[UserController::class,'MyAccount']);
    Route::post('/parent/accout',[UserController::class,'UpdateMyAccount']);

    //Change Password
    Route::get('/parent/change_password',[UserController::class,'change_password']);
    Route::post('/parent/change_password',[UserController::class,'update_change_password']);
});

