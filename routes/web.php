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

    Route::get('/create_anak_magang',[HomeController::class,'create_anak_magang'])->name('create_anak_magang');
    Route::post('/input-anak-magang',[HomeController::class,'store_anak_magang'])->name('input-anak-magang');

    Route::delete('/delete-anak/{id}',[HomeController::class,'delete_anak'])->name('delete-anak');
    Route::get( '/edit-anak/{id}',[HomeController::class,'edit_anak'])->name('edit-anak');
    Route::put( '/ubah-anak/{id}',[HomeController::class,'ubah_anak'])->name('ubah-anak');
    Route::get('/cari-anak',[HomeController::class,'cari_anak'])->name('cari-anak');


    Route::get('/create-admin',[HomeController::class,'create_admin'])->name('create-admin');
    Route::get('/cari-admin',[HomeController::class,'cari_admin'])->name('cari-admin');
    Route::post('/input-admin',[HomeController::class,'store'])->name('input-admin');

    Route::delete('/delete-admin/{id}',[HomeController::class,'delete_admin'])->name('delete-admin');
    Route::get( '/ubah-admin/{id}',[HomeController::class,'ubah_admin'])->name('ubah-admin');
    Route::put( '/edit-admin/{id}',[HomeController::class,'edit_admin'])->name('edit-admin');


    Route::get('/index',[HomeController::class,'index'])->name('index');

    Route::get('/create_admin', [HomeController::class, 'create_admin'])->name('create_admin');
    Route::post('/input-admin',[HomeController::class,'store_admin'])->name('input-admin');


    Route::get('/create-sekolah',[HomeController::class,'create_sekolah'])->name('create-sekolah');
    Route::post('/input-sekolah',[HomeController::class,'store_sekolah'])->name('input_sekolah');
    Route::get('/cari-sekolah',[HomeController::class,'cari_sekolah'])->name('cari-sekolah');


    Route::get( '/edit-sekolah/{id}',[HomeController::class,'edit_sekolah'])->name('edit-sekolah');
    Route::put( '/ubah-sekolah/{id}',[HomeController::class,'ubah_sekolah'])->name('ubah-sekolah');

    Route::delete('/delete-data/{id}',[HomeController::class,'delete_data'])->name('delete-data');
    Route::get('/tambah_data_sekolah',[HomeController::class,'sekolah'])->name('tambah_data_sekolah');

    Route::get('/serverside',[DataTableController::class,'serverside'])->name('serverside');


    Route::get('/serverside',[DataTableController::class,'serverside'])->name('serverside');

    Route::get('/edit/{id}',[HomeController::class,'edit'])->name('user.edit');
    Route::put('/update/{id}',[HomeController::class,'update'])->name('user.update');
    Route::delete('/delete/{id}',[HomeController::class,'delete'])->name('user.delete');
});

Route::group(['prefix' => 'writer', 'middleware' => ['auth'], 'as' => 'writer.'], function() {
    Route::get('/dashboard_user', [WriterController::class, 'dashboard_user'])->name('dashboard_user');

    Route::get('/profile',[HomeController::class,'profile'])->name('profile');
    Route::get('/edit-profile',[HomeController::class,'edit_profile'])->name('edit-profile');
    Route::post('/update-profile',[HomeController::class,'update_profile'])->name('update-profile');

    Route::get('/tambah-aktivitas',[WriterController::class,'index'])->name('tambah-aktivitas');
    Route::post('/tambah-data-aktivitas',[WriterController::class,'aktivitas'])->name('tambah-data-aktivitas');
    Route::delete('/delete-data/{id}',[WriterController::class,'delete_data'])->name('delete-data');
    Route::get('/edit-user/{id}',[WriterController::class,'edit_user'])->name('edit-user');
    Route::put('/store-edit-user/{id}', [WriterController::class, 'store_edit_user'])->name('store-edit-user');

    Route::get('/cari-aktivitas',[WriterController::class,'cari_aktivitas'])->name('cari-aktivitas');

});
