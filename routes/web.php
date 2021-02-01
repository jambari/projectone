<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KehadiranController;
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

Route::get('/', 'App\Http\Controllers\KehadiranController@index')->name('welcome');

Route::get('/masuk', function () {
    return view('masuk');
});

Route::get('/pulang', function () {
    return view('pulang');
});


// Route::resource('/kehadirans', KehadiranController::class);
Route::get('/kehadirans/masuk', 'App\Http\Controllers\KehadiranController@masuk');
Route::get('/kehadirans/pulang', 'App\Http\Controllers\KehadiranController@pulang');
Route::post('/kehadirans/masuk/post', 'App\Http\Controllers\KehadiranController@store')->name('absen.masuk');
Route::get('/buatizin', 'App\Http\Controllers\IzinController@create')->name('buatizin');
Route::post('/izin', 'App\Http\Controllers\IzinController@store')->name('izin');
Route::get('/admin/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
