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
Route::group([ 'middleware' => 'auth'], function () {

    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    // TENDER - FOLDER    
    Route::get('/tender', [App\Http\Controllers\TenderController::class, 'index'])->name('tender.index');
    Route::post('/tender/store_folder/{id}', [App\Http\Controllers\TenderController::class, 'store_folder'])->name('tender.store_folder');
    Route::get('/tender/show/{id}', [App\Http\Controllers\TenderController::class, 'show'])->name('tender.show');
    Route::post('/tender/rename_folder/{id}', [App\Http\Controllers\TenderController::class, 'rename_folder'])->name('tender.rename_folder');
    Route::delete('/tender/destroy_folder/{id}', [App\Http\Controllers\TenderController::class, 'destroy_folder'])->name('tender.destroy_folder');
    // TENDER - FILE
    Route::get('/tender/{slug}', [App\Http\Controllers\TenderController::class, 'detail_folder'])->name('tender.detail_folder');
    Route::post('/tender/store_file/{id}', [App\Http\Controllers\TenderController::class, 'store_file'])->name('tender.store_file');
    Route::get('/tender/show_file/{id}', [App\Http\Controllers\TenderController::class, 'show_file'])->name('tender.show_file');
    Route::post('/tender/rename_file/{id}', [App\Http\Controllers\TenderController::class, 'rename_file'])->name('tender.rename_file');
    Route::delete('/tender/destroy_file/{id}', [App\Http\Controllers\TenderController::class, 'destroy_file'])->name('tender.destroy_file');
    Route::get('/tender/download_file/{id}', [App\Http\Controllers\TenderController::class, 'download_file'])->name('tender.download_file');
    Route::get('/tender/filter_file/{slug}', [App\Http\Controllers\TenderController::class, 'filter_file'])->name('tender.filter_file');
    Route::get('/tender/sort_file/{slug}', [App\Http\Controllers\TenderController::class, 'sort_file'])->name('tender.sort_file');
    

    // ADMIN
    Route::get('/admin',  [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
    Route::get('/admin/create',  [App\Http\Controllers\AdminController::class, 'create'])->name('admin.create');
    Route::post('/admin/store',  [App\Http\Controllers\AdminController::class, 'store'])->name('admin.store');
    Route::get('/admin/edit',  [App\Http\Controllers\AdminController::class, 'edit'])->name('admin.edit');
});