<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\General_Controller;
use App\Http\Controllers\Student_Controller;
use App\Http\Controllers\Admin_Controller;

// General Routes

Route::get('/',[General_Controller::class,'home']);

Route::get('/downloadresume/{id}',[General_Controller::class,'downloadresume']);

// Student Routes

Route::get('/student/studentregister',[Student_Controller::class,'studentregister']);

Route::post('/student/studentregister',[Student_Controller::class,'submitstudentregister']);

Route::get('/student/studentlogin',[Student_Controller::class,'studentlogin']);

Route::post('/student/studentlogin',[Student_Controller::class,'studentauthentication']);

Route::get('/student/studentpage',[Student_Controller::class,'studentpage'])->name('studentpage')->middleware('student_access');

Route::get('/student/editstudent/{id}',[Student_Controller::class,'editstudent'])->middleware('student_access');

Route::post('/student/editstudent/{id}',[Student_Controller::class,'submiteditstudent'])->middleware('student_access');

Route::get('/student/deletestudent/{id}',[Student_Controller::class,'deletestudent'])->middleware('student_access');

Route::post('/student/uploadresume',[Student_Controller::class,'uploadresume'])->middleware('student_access');

// Admin Routes

Route::get('/admin/adminregister',[Admin_Controller::class,'adminregister']);

Route::post('/admin/adminregister',[Admin_Controller::class,'submitadminregister']);

Route::get('/admin/adminlogin',[Admin_Controller::class,'adminlogin']);

Route::post('/admin/adminlogin',[Admin_Controller::class,'adminauthentication']);

Route::get('/admin/adminpage',[Admin_Controller::class,'adminpage'])->name('adminpage')->middleware('admin_access');

Route::get('/admin/allcompanies',[Admin_Controller::class,'allcompanies'])->middleware('admin_access');

Route::get('/admin/addcompany',[Admin_Controller::class,'addcompany'])->middleware('admin_access');

Route::post('/admin/addcompany',[Admin_Controller::class,'submitaddcompany'])->middleware('admin_access');

Route::get('/admin/addcompany/selectcourses',[Admin_Controller::class,'selectcourses'])->middleware('admin_access');

Route::post('/admin/addcompany/selectcourses',[Admin_Controller::class,'submitselectcourses'])->middleware('admin_access');

Route::get('/admin/editcompany/{id}',[Admin_Controller::class,'editcompany'])->middleware('admin_access');

Route::post('/admin/editcompany/{id}',[Admin_Controller::class,'submiteditcompany'])->middleware('admin_access');

Route::get('/admin/deletecompany/{id}',[Admin_Controller::class,'deletecompany'])->middleware('admin_access');

Route::get('/admin/percompanyeligiblestudents/{id}',[Admin_Controller::class,'percompanyeligiblestudents'])->middleware('admin_access');

Route::get('/admin/downloadexcel/{id}',[Admin_Controller::class,'downloadexcel'])->middleware('admin_access');

Route::get('/admin/addcourse',[Admin_Controller::class,'addcourse'])->middleware('admin_access');

Route::post('/admin/addcourse',[Admin_Controller::class,'submitaddcourse'])->middleware('admin_access');









