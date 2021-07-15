<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::resource('register', RegisterController::class)->only(['index', 'store'])->middleware('guest');
Route::resource('login', SessionsController::class)->only(['index', 'store'])->middleware('guest');

Route::post('logout',[SessionsController::class,'destroy'])->middleware('auth');
Route::resource('profile', ProfileController::class)->only(['index', 'store'])->middleware('auth');


// admin crud
Route::resource('admin', AdminController::class)->only(['index', 'store'])->middleware('auth');
Route::get('admin/delete/{id}',[AdminController::class,'delete'])->middleware('auth');
Route::get('admin/edit/{id}',[AdminController::class,'showdata'])->middleware('auth');
