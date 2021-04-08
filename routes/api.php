<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/',function(){
	return ['Welcome To my API, Enjoy my site'];
});

Route::post('/login',[LoginController::class,'login']);

Route::get('/user/{id}',[UserController::class,'view']);
Route::get('/user/{id}/delete',[UserController::class,'delete']);
Route::get('/user',[UserController::class,'all']);
Route::post('/user/register',[UserController::class,'register']);
Route::post('/user/{id}/edit',[UserController::class,'change']);
