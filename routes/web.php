<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pcontroller;

Route::get('/',[pcontroller::class,'home']);

Route::get('/studentlogin',[pcontroller::class,'studentlogin']);

Route::post('/studentlogin',[pcontroller::class,'studentauthentication']);

Route::get('/studentregister/',[pcontroller::class,'studentregister']);

Route::post('/studentregister',[pcontroller::class,'submitstudentregister']);

Route::get('/studentpage',[pcontroller::class,'studentpage'])->name('studentpage');

Route::get('/editstudent/{id}',[pcontroller::class,'editstudent']);

Route::post('/editstudent/{id}',[pcontroller::class,'submiteditstudent']);

Route::get('/deletestudent/{id}',[pcontroller::class,'deletestudent']);

Route::get('/adminregister',[pcontroller::class,'adminregister']);

Route::post('/adminregister',[pcontroller::class,'submitadminregister']);

Route::get('/adminlogin',[pcontroller::class,'adminlogin']);

Route::post('/adminlogin',[pcontroller::class,'adminauthentication']);

Route::get('/adminpage',[pcontroller::class,'adminpage'])->name('adminpage');

Route::get('/allcompanies',[pcontroller::class,'allcompanies']);

Route::get('/addcompany',[pcontroller::class,'addcompany']);

Route::post('/addcompany',[pcontroller::class,'submitaddcompany']);

Route::get('/editcompany/{id}',[pcontroller::class,'editcompany']);

Route::post('/editcompany/{id}',[pcontroller::class,'submiteditcompany']);

Route::get('/deletecompany/{id}',[pcontroller::class,'deletecompany']);

Route::post('/uploadresume',[pcontroller::class,'uploadresume']);

Route::post('/downloadresume',[pcontroller::class,'downloadresume']);

Route::get('/percompanyeligiblestudents/{id}',[pcontroller::class,'percompanyeligiblestudents']);

Route::get('/downloadexcel/{id}',[pcontroller::class,'downloadexcel']);





