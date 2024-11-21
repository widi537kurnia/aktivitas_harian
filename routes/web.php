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
//   echo "Hello world";
//});
Route::get('/',[LoginController::class,'index'])->name('login');
Route::post('/login-proses',[LoginController::class,'login_proses'])->name('login-proses');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');

Route::get('/register',[LoginController::class,'register'])->name('register');
Route::post('/register-proses',[LoginController::class,'register_proses'])->name('register-proses');

Route::get('/dashboard',[HomeController::class,'dashboard'])->name('dashboard');

Route::group(['prefix' => 'admin','middleware' => ['auth'], 'as' => 'admin.'] , function(){

    Route::get('/dashboard',[HomeController::class,'dashboard'])->name('dashboard');
    Route::get('/dashboard_admin',[HomeController::class,'dashboard_admin'])->name('dashboard_admin');
    Route::get('/jumlah_sekolah',[HomeController::class,'jumlah_sekolah'])->name('jumlah_sekolah');
    Route::get('/jumlah_anak_magang',[HomeController::class,'jumlah_anak_magang'])->name('jumlah_anak_magang');
    Route::get('/jumlah_admin',[HomeController::class,'jumlah_admin'])->name('jumlah_admin');

    Route::get('/create_sekolah',[HomeController::class,'create_sekolah'])->name('add.create_sekolah');
    Route::get('/create_anak_magang',[HomeController::class,'create_anak_magang'])->name('add.create_anak_magang');
    Route::get('/create_admin',[HomeController::class,'create_admin'])->name('add.create_admin');

    Route::get('/tambah_data_sekolah',[HomeController::class,'sekolah'])->name('tambah_data_sekolah');

    Route::get('/serverside',[DataTableController::class,'serverside'])->name('serverside');

    Route::post('/store',[HomeController::class,'store'])->name('user.store');

    Route::get('/serverside',[DataTableController::class,'serverside'])->name('serverside');

    Route::get('/profile',[HomeController::class,'profile'])->name('profile');
    Route::get('/edit-profile',[HomeController::class,'edit_profile'])->name('edit-profile');
    Route::post('/update-profile',[HomeController::class,'update_profile'])->name('update-profile');

    Route::get('/edit/{id}',[HomeController::class,'edit'])->name('user.edit');
    Route::put('/update/{id}',[HomeController::class,'update'])->name('user.update');
    Route::delete('/delete/{id}',[HomeController::class,'delete'])->name('user.delete');
});

Route::group(['prefix' => 'writer', 'middleware' => ['auth'], 'as' => 'writer.'], function() {
    Route::get('/dashboard_user', [WriterController::class, 'dashboard_user'])->name('dashboard_user');

    Route::get('/tambah-aktivitas',[HomeController::class,'index'])->name('tambah-aktivitas');
    Route::post('/tambah-data-aktivitas',[HomeController::class,'aktivitas'])->name('tambah-data-aktivitas');

});
