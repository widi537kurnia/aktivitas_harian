<?php

use App\Http\Controllers\DataTableController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
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
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login-proses',[LoginController::class,'login_proses'])->name('login-proses');


Route::get('/register',[LoginController::class,'register'])->name('register');
Route::post('/register-proses',[LoginController::class,'register_proses'])->name('register-proses');

Route::get('/logout',[LoginController::class,'logout'])->name('logout');

Route::group(['prefix' => 'admin','middleware' => ['auth'], 'as' => 'admin.'] , function(){

    Route::get('/dashboard',[HomeController::class,'dashboard'])->name('dashboard');

    Route::get('/serverside',[DataTableController::class,'serverside'])->name('serverside');

    Route::get('/tambah-aktivitas',[HomeController::class,'index'])->name('tambah-aktivitas');
    Route::post('/tambah-data-aktivitas',[HomeController::class,'aktivitas'])->name('tambah-data-aktivitas');

    Route::post('/store',[HomeController::class,'store'])->name('user.store');

    Route::get('/edit/{id}',[HomeController::class,'edit'])->name('user.edit');
    Route::put('/update/{id}',[HomeController::class,'update'])->name('user.update');
    Route::delete('/delete/{id}',[HomeController::class,'delete'])->name('user.delete');
});
