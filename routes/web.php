<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
		return redirect()->route('login.index');
});

Route::resource('/login',LoginController::class);
Route::resource('/register',RegisterController::class);

Route::get('/logout',[LoginController::class,'logout']);

Route::middleware(['auth'])->group(function () {
    Route::resource('/dashboard',DashboardController::class); 
    Route::resource('/user',UserController::class);   
});