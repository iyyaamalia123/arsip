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
    // Searching
    Route::get('/tender/searching', [App\Http\Controllers\TenderController::class, 'searching'])->name('tender.searching');
    // TENDER - FILE
    Route::get('/tender/{slug}', [App\Http\Controllers\TenderController::class, 'detail_folder'])->name('tender.detail_folder');
    Route::post('/tender/store_file/{id}', [App\Http\Controllers\TenderController::class, 'store_file'])->name('tender.store_file');
    Route::get('/tender/show_file/{id}', [App\Http\Controllers\TenderController::class, 'show_file'])->name('tender.show_file');
    Route::post('/tender/rename_file/{id}', [App\Http\Controllers\TenderController::class, 'rename_file'])->name('tender.rename_file');
    Route::delete('/tender/destroy_file/{id}', [App\Http\Controllers\TenderController::class, 'destroy_file'])->name('tender.destroy_file');
    Route::get('/tender/download_file/{id}', [App\Http\Controllers\TenderController::class, 'download_file'])->name('tender.download_file');
    Route::get('/tender/filter_file/{slug}', [App\Http\Controllers\TenderController::class, 'filter_file'])->name('tender.filter_file');
    Route::get('/tender/sort_file/{slug}', [App\Http\Controllers\TenderController::class, 'sort_file'])->name('tender.sort_file');
    
     // PROYEK - FOLDER    
     Route::get('/proyek', [App\Http\Controllers\ProyekController::class, 'index'])->name('proyek.index');
     Route::post('/proyek/store_folder/{id}', [App\Http\Controllers\ProyekController::class, 'store_folder'])->name('proyek.store_folder');
     Route::get('/proyek/show/{id}', [App\Http\Controllers\ProyekController::class, 'show'])->name('proyek.show');
     Route::post('/proyek/rename_folder/{id}', [App\Http\Controllers\ProyekController::class, 'rename_folder'])->name('proyek.rename_folder');
     Route::delete('/proyek/destroy_folder/{id}', [App\Http\Controllers\ProyekController::class, 'destroy_folder'])->name('proyek.destroy_folder');
       // Searching
    Route::get('/proyek/searching', [App\Http\Controllers\ProyekController::class, 'searching'])->name('proyek.searching');
     // PROYEK - FILE
     Route::get('/proyek/{slug}', [App\Http\Controllers\ProyekController::class, 'detail_folder'])->name('proyek.detail_folder');
     Route::post('/proyek/store_file/{id}', [App\Http\Controllers\ProyekController::class, 'store_file'])->name('proyek.store_file');
     Route::get('/proyek/show_file/{id}', [App\Http\Controllers\ProyekController::class, 'show_file'])->name('proyek.show_file');
     Route::post('/proyek/rename_file/{id}', [App\Http\Controllers\ProyekController::class, 'rename_file'])->name('proyek.rename_file');
     Route::delete('/proyek/destroy_file/{id}', [App\Http\Controllers\ProyekController::class, 'destroy_file'])->name('proyek.destroy_file');
     Route::get('/proyek/download_file/{id}', [App\Http\Controllers\ProyekController::class, 'download_file'])->name('proyek.download_file');
     Route::get('/proyek/filter_file/{slug}', [App\Http\Controllers\ProyekController::class, 'filter_file'])->name('proyek.filter_file');
     Route::get('/proyek/sort_file/{slug}', [App\Http\Controllers\ProyekController::class, 'sort_file'])->name('proyek.sort_file');
    
     // INVENTARIS - FOLDER    
    Route::get('/inventaris', [App\Http\Controllers\InventarisController::class, 'index'])->name('inventaris.index');
    Route::post('/inventaris/store_folder/{id}', [App\Http\Controllers\InventarisController::class, 'store_folder'])->name('inventaris.store_folder');
    Route::get('/inventaris/show/{id}', [App\Http\Controllers\InventarisController::class, 'show'])->name('inventaris.show');
    Route::post('/inventaris/rename_folder/{id}', [App\Http\Controllers\InventarisController::class, 'rename_folder'])->name('inventaris.rename_folder');
    Route::delete('/inventaris/destroy_folder/{id}', [App\Http\Controllers\InventarisController::class, 'destroy_folder'])->name('inventaris.destroy_folder');
    // Searching
    Route::get('/inventaris/searching', [App\Http\Controllers\InventarisController::class, 'searching'])->name('inventaris.searching');
    // INVENTARIS - FILE
    Route::get('/inventaris/{slug}', [App\Http\Controllers\InventarisController::class, 'detail_folder'])->name('inventaris.detail_folder');
    Route::post('/inventaris/store_file/{id}', [App\Http\Controllers\InventarisController::class, 'store_file'])->name('inventaris.store_file');
    Route::get('/inventaris/show_file/{id}', [App\Http\Controllers\InventarisController::class, 'show_file'])->name('inventaris.show_file');
    Route::post('/inventaris/rename_file/{id}', [App\Http\Controllers\InventarisController::class, 'rename_file'])->name('inventaris.rename_file');
    Route::delete('/inventaris/destroy_file/{id}', [App\Http\Controllers\InventarisController::class, 'destroy_file'])->name('inventaris.destroy_file');
    Route::get('/inventaris/download_file/{id}', [App\Http\Controllers\InventarisController::class, 'download_file'])->name('inventaris.download_file');
    Route::get('/inventaris/filter_file/{slug}', [App\Http\Controllers\InventarisController::class, 'filter_file'])->name('inventaris.filter_file');
    Route::get('/inventaris/sort_file/{slug}', [App\Http\Controllers\InventarisController::class, 'sort_file'])->name('inventaris.sort_file');
   
    // KEUANGAN - FOLDER    
    Route::get('/keuangan', [App\Http\Controllers\KeuanganController::class, 'index'])->name('keuangan.index');
    Route::post('/keuangan/store_folder/{id}', [App\Http\Controllers\KeuanganController::class, 'store_folder'])->name('keuangan.store_folder');
    Route::get('/keuangan/show/{id}', [App\Http\Controllers\KeuanganController::class, 'show'])->name('keuangan.show');
    Route::post('/keuangan/rename_folder/{id}', [App\Http\Controllers\KeuanganController::class, 'keuangan_folder'])->name('keuangan.rename_folder');
    Route::delete('/keuangan/destroy_folder/{id}', [App\Http\Controllers\KeuanganController::class, 'destroy_folder'])->name('keuangan.destroy_folder');
      // Searching
      Route::get('/keuangan/searching', [App\Http\Controllers\KeuanganController::class, 'searching'])->name('keuangan.searching');
    // KEUANGAN - FILE
    Route::get('/keuangan/{slug}', [App\Http\Controllers\KeuanganController::class, 'detail_folder'])->name('keuangan.detail_folder');
    Route::post('/keuangan/store_file/{id}', [App\Http\Controllers\KeuanganController::class, 'store_file'])->name('keuangan.store_file');
    Route::get('/keuangan/show_file/{id}', [App\Http\Controllers\KeuanganController::class, 'show_file'])->name('keuangan.show_file');
    Route::post('/keuangan/rename_file/{id}', [App\Http\Controllers\KeuanganController::class, 'rename_file'])->name('keuangan.rename_file');
    Route::delete('/keuangan/destroy_file/{id}', [App\Http\Controllers\KeuanganController::class, 'destroy_file'])->name('keuangan.destroy_file');
    Route::get('/keuangan/download_file/{id}', [App\Http\Controllers\KeuanganController::class, 'download_file'])->name('keuangan.download_file');
    Route::get('/keuangan/filter_file/{slug}', [App\Http\Controllers\KeuanganController::class, 'filter_file'])->name('keuangan.filter_file');
    Route::get('/keuangan/sort_file/{slug}', [App\Http\Controllers\KeuanganController::class, 'sort_file'])->name('keuangan.sort_file');

 // LAIN-LAIN - FOLDER    
 Route::get('/lain', [App\Http\Controllers\LainController::class, 'index'])->name('lain.index');
 Route::post('/lain/store_folder/{id}', [App\Http\Controllers\LainController::class, 'store_folder'])->name('lain.store_folder');
 Route::get('/lain/show/{id}', [App\Http\Controllers\LainController::class, 'show'])->name('lain.show');
 Route::post('/lain/rename_folder/{id}', [App\Http\Controllers\LainController::class, 'lain_folder'])->name('lain.rename_folder');
 Route::delete('/lain/destroy_folder/{id}', [App\Http\Controllers\LainController::class, 'destroy_folder'])->name('lain.destroy_folder');
 // Searching
 Route::get('/lain/searching', [App\Http\Controllers\LainController::class, 'searching'])->name('lain.searching');
 // LAIN-LAIN - FILE
 Route::get('/lain/{slug}', [App\Http\Controllers\LainController::class, 'detail_folder'])->name('lain.detail_folder');
 Route::post('/lain/store_file/{id}', [App\Http\Controllers\LainController::class, 'store_file'])->name('lain.store_file');
 Route::get('/lain/show_file/{id}', [App\Http\Controllers\LainController::class, 'show_file'])->name('lain.show_file');
 Route::post('/lain/rename_file/{id}', [App\Http\Controllers\LainController::class, 'rename_file'])->name('lain.rename_file');
 Route::delete('/lain/destroy_file/{id}', [App\Http\Controllers\LainController::class, 'destroy_file'])->name('lain.destroy_file');
 Route::get('/lain/download_file/{id}', [App\Http\Controllers\LainController::class, 'download_file'])->name('lain.download_file');
 Route::get('/lain/filter_file/{slug}', [App\Http\Controllers\LainController::class, 'filter_file'])->name('lain.filter_file');
 Route::get('/lain/sort_file/{slug}', [App\Http\Controllers\LainController::class, 'sort_file'])->name('lain.sort_file');


    // ADMIN
    Route::get('/admin',  [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
    Route::get('/admin/create',  [App\Http\Controllers\AdminController::class, 'create'])->name('admin.create');
    Route::post('/admin/store',  [App\Http\Controllers\AdminController::class, 'store'])->name('admin.store');
    Route::get('/admin/edit/{id}',  [App\Http\Controllers\AdminController::class, 'edit'])->name('admin.edit');
    Route::post('/admin/update/{id}',  [App\Http\Controllers\AdminController::class, 'update'])->name('admin.update');
    Route::get('/admin/destroy/{id}',  [App\Http\Controllers\AdminController::class, 'destroy'])->name('admin.destroy');
    // SEARCHING
    Route::get('/admin/searching', [App\Http\Controllers\AdminController::class, 'searching'])->name('admin.searching');

    // KARYAWAN
    Route::get('/karyawan',  [App\Http\Controllers\KaryawanController::class, 'index'])->name('karyawan');
    Route::get('/karyawan/create',  [App\Http\Controllers\KaryawanController::class, 'create'])->name('karyawan.create');
    Route::post('/karyawan/store',  [App\Http\Controllers\KaryawanController::class, 'store'])->name('karyawan.store');
    Route::get('/karyawan/edit/{id}',  [App\Http\Controllers\KaryawanController::class, 'edit'])->name('karyawan.edit');
    Route::post('/karyawan/update/{id}',  [App\Http\Controllers\KaryawanController::class, 'update'])->name('karyawan.update');
    Route::get('/karyawan/destroy/{id}',  [App\Http\Controllers\KaryawanController::class, 'destroy'])->name('karyawan.destroy');

      // SEARCHING
      Route::get('/karyawan/searching', [App\Http\Controllers\KaryawanController::class, 'searching'])->name('karyawan.searching');
    
    Route::post('/menu/store',  [App\Http\Controllers\MenuController::class, 'store'])->name('menu.store');
    
    Route::get('/menu/{menu}',  [App\Http\Controllers\MenuController::class, 'index'])->name('menu.index');
    Route::post('/menu/store_folder/{id}', [App\Http\Controllers\MenuController::class, 'store_folder'])->name('menu.store_folder');
    Route::get('/menu/show/{id}', [App\Http\Controllers\MenuController::class, 'show'])->name('menu.show');
    Route::post('/menu/rename_folder/{id}', [App\Http\Controllers\MenuController::class, 'rename_folder'])->name('menu.rename_folder');
    Route::delete('/menu/destroy_folder/{id}', [App\Http\Controllers\MenuController::class, 'destroy_folder'])->name('menu.destroy_folder');
      // Searching
      Route::get('/menu/{menu}/searching', [App\Http\Controllers\MenuController::class, 'searching'])->name('menu.searching');
      // Menu - FILE
      Route::get('/menu/{menu}/{slug}', [App\Http\Controllers\MenuController::class, 'detail_folder'])->name('menu.detail_folder');
      Route::post('/menu/store_file/{id}', [App\Http\Controllers\MenuController::class, 'store_file'])->name('menu.store_file');
      Route::get('/menu/show_file/{id}', [App\Http\Controllers\MenuController::class, 'show_file'])->name('menu.show_file');
      Route::post('/menu/rename_file/{id}', [App\Http\Controllers\MenuController::class, 'rename_file'])->name('menu.rename_file');
      Route::delete('/menu/destroy_file/{id}', [App\Http\Controllers\MenuController::class, 'destroy_file'])->name('menu.destroy_file');
      Route::get('/menu/download_file/{id}', [App\Http\Controllers\MenuController::class, 'download_file'])->name('menu.download_file');
      Route::get('/menu/filter_file/{slug}', [App\Http\Controllers\MenuController::class, 'filter_file'])->name('menu.filter_file');
      Route::get('/menu/sort_file/{slug}', [App\Http\Controllers\MenuController::class, 'sort_file'])->name('menu.sort_file');

  

});