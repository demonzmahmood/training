<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
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



      //Get methods Localized.
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){


        Route::get('/', function () {
            return view('welcome');
        });


        Route::group(['middleware' => ['role:user']], function () {
            Route::resource('user', UserController::class)->only(['index','create','show','edit']);
        });


        Route::group(['middleware' => ['role:admin']], function () {
            Route::resource('admin', AdminController::class)->only(['index','create','show','edit']);
        });

        Route::group(['middleware' => 'guest'], function() {
            Route::resource('register', RegisterController::class)->only(['index']);
            Route::resource('login', SessionsController::class)->only(['index']);
        });


});
        // Post Methods .
        Route::group(['middleware' => ['role:user']], function () {
            Route::resource('user', UserController::class)->only(['store','update','destroy']);
        });

        Route::group(['middleware' => ['role:admin']], function () {
            Route::resource('admin', AdminController::class)->only(['store','update','destroy']);
        });

        Route::group(['middleware' => 'guest'], function() {
            Route::resource('register', RegisterController::class)->only(['store']);
            Route::resource('login', SessionsController::class)->only(['store']);
        });

        Route::group(['middleware' => 'auth'], function() {
            Route::post('logout',[SessionsController::class,'destroy']);
        });













// admin crud change them to one line
// do create users/create admins


//Route::resource('admin', AdminController::class)->only(['index', 'store','create','show'])->middleware('auth');
//Route::get('admin/delete/{id}',[AdminController::class,'delete'])->middleware('auth');
//Route::get('admin/edit/{id}',[AdminController::class,'showdata'])->middleware('auth');


