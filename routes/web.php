<?php

use App\Http\Controllers\DataTableController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WriterController;
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

//Route::get('/', function () {
//   echo "hello world";
//});
Route::get('/',[LoginController::class,'index'])->name('login');
Route::post('/login-proses',[LoginController::class,'login_proses'])->name('login-proses');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');

Route::get('/register',[LoginController::class,'register'])->name('register');
Route::post('/register-proses',[LoginController::class,'register_proses'])->name('register-proses');

Route::group(['prefix' => 'admin','middleware' => ['auth'], 'as' => 'admin.'] , function(){

    Route::get('/user',[HomeController::class,'index'])->name('index');
    Route::get('/create',[HomeController::class,'create'])->name('user.create');
    Route::post('/store',[HomeController::class,'store'])->name('user.store');

    Route::get('/serverside',[DataTableController::class,'serverside'])->name('serverside');

    Route::get('/profile',[HomeController::class,'profile'])->name('profile');
    Route::get('/edit-profile',[HomeController::class,'edit_profile'])->name('edit-profile');

    Route::get('/edit/{id}',[HomeController::class,'edit'])->name('user.edit');
    Route::put('/update/{id}',[HomeController::class,'update'])->name('user.update');
    Route::delete('/delete/{id}',[HomeController::class,'delete'])->name('user.delete');
});

Route::group(['prefix' => 'writer', 'middleware' => ['auth'], 'as' => 'writer.'], function() {
    Route::get('/dashboard_user',[WriterController::class,'dashboard_user'])->name('dashboard_user');
});
