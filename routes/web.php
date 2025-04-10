<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\LoginController;

Route::get('/',[LoginController::class,'login'])->name('login');
Route::post('/do-login',[LoginController::class,'dologin'])->name('dologin');



Route::get('/users',[HomepageController::class,'homepage'])->name('home');
Route::get('/create',[HomepageController::class,'create'])->name('create');
Route::post('/saveuser',[HomepageController::class,'saveUser'])->name('saveUser');
Route::get('about-us',[HomepageController::class,'about'])->name('about');
Route::get('contact-now',[HomepageController::class,'contact'])->name('contact');
Route::get('edit/{id}',[HomepageController::class,'edit'])->name('edit');
Route::get('view-user/{id}',[HomepageController::class,'viewuser'])->name('viewuser');
Route::post('update',[HomepageController::class,'update'])->name('update');
Route::get('delete/{id}',[HomepageController::class,'delete'])->name('delete');
Route::get('activate/{id}',[HomepageController::class,'activate'])->name('activate');
Route::get('forcedelete/{id}',[HomepageController::class,'forceDelete'])->name('forceDelete');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/export', [HomepageController::class, 'export'])->name('export');
Route::get('/pdf', [HomepageController::class, 'pdf'])->name('pdf');

