<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthControllerUser;
use App\Http\Controllers\HomeController;


//ROUTE TEMPILAN AWAL
Route::get('/', [App\Http\Controllers\HomeController::class, 'landingpage'])->name('landingpage');
Route::get('/landingpage', [App\Http\Controllers\HomeController::class, 'landingpage'])->name('landingpage');
Route::get('/lihatantrian', [App\Http\Controllers\HomeController::class, 'lihatantrian'])->name('lihatantrian');
//Route admin

// Route::get('/', [AuthController::class, 'showFormLogin'])->name('login');
Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showFormRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('/dashboard', [App\Http\Controllers\dasboardadminController::class, 'dashboardadmin'])->name('dashboardadmin');

//Route Pengguna
Route::get('/utama', [AuthControllerUser::class, 'showFormLoginuser'])->name('loginuser');
Route::get('loginuser', [AuthControllerUser::class, 'showFormLoginuser'])->name('loginuser');
Route::post('loginuser', [AuthControllerUser::class, 'loginuser']);
Route::get('registeruser', [AuthControllerUser::class, 'showFormRegisteruser'])->name('registeruser');
Route::post('registeruser', [AuthControllerUser::class, 'registeruser']);
Route::get('homeuser', [HomeController::class, 'tampil'])->name('homeuser');


// Route Antrian
Route::get('nomor-antrian', 'App\Http\Controllers\AntrianController@index');
Route::get('ambilantrian', 'App\Http\Controllers\AntrianController@getAntrian');

Route::get('panggil', 'App\Http\Controllers\PanggilAntrianController@index');
Route::delete('layani{id}','App\Http\Controllers\PanggilAntrianController@delete' );

Route::group(['middleware' => 'auth'], function () {
 
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
 
});

