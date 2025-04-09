<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\CheckUserIsLoggedIn;

Route::get('/',[LoginController::class,'login'])->name('login');
Route::post('/do-login',[LoginController::class,'dologin'])->name('dologin');



Route::get('/users',[HomepageController::class,'homepage'])->name('home');
Route::get('/create',[HomepageController::class,'create'])->name('create');
Route::post('/saveuser',[HomepageController::class,'saveuser'])->name('saveuser');
route::get('about-us',[HomepageController::class,'about'])->name('about');
route::get('contact-now',[HomepageController::class,'contact'])->name('contact');
route::get('edit/{id}',[HomepageController::class,'edit'])->name('edit');
route::get('view-user/{id}',[HomepageController::class,'viewuser'])->name('viewuser');
route::post('update',[HomepageController::class,'update'])->name('update');
route::get('delete/{id}',[HomepageController::class,'delete'])->name('delete');
route::get('activate/{id}',[HomepageController::class,'activate'])->name('activate');
route::get('forcedelete/{id}',[HomepageController::class,'forcedelete'])->name('forcedelete');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/export', [HomepageController::class, 'export'])->name('export');
Route::get('/pdf', [HomepageController::class, 'pdf'])->name('pdf');

