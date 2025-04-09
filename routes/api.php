<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::post('getprofile', [ApiController::class, 'getProfile']);
Route::post('login', [ApiController::class, 'login']);
