<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::get('/tender', function () {
    return view('tender.index');
});
Route::get('/tender/detail', function () {
    return view('tender.detail');
});
Route::get('/admin',  [App\Http\Controllers\AdminController::class, 'index'])->name('admin');

Route::get('/karyawan',  [App\Http\Controllers\KaryawanController::class, 'index'])->name('karyawan');

Route::get('/karyawan/create',  [App\Http\Controllers\KaryawanController::class, 'create'])->name('karyawan.create');

Route::get('/tender/create',  [App\Http\Controllers\KaryawanController::class, 'create'])->name('tender.create');

