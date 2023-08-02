<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\RwController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
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

Route::get('/', function () {
    return view('Pages.index');
});

Route::get('/login', function () {
    return view('pages.login');
})->name('login')->middleware('guest');

Route::post('/login', [UserController::class, 'authenticate'])->middleware('guest')->name('login');
Route::post('/logout', [UserController::class, 'logout']);

// route dashboard

Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard')->middleware('auth');

Route::get('/home', function () {
    return view('pages.home');
});

// Rute yang hanya dapat diakses oleh Admin

Route::get('/datart', [HomeController::class, 'show_rt'])->name('show.rt')->middleware("auth");
Route::get('/data_warga/{id_user}', [HomeController::class, 'show_warga'])->name('show.warga')->middleware("auth");
Route::get('/testes/{id_user}', [HomeController::class, 'table_rt'])->name('show')->middleware("auth");

Route::get('/detail-rt/{id_user}', [HomeController::class, 'detail_rt'])->name('detail.rt')->middleware("auth");
Route::get('/edit-rt/{id_user}', [HomeController::class, 'edit_rt'])->name('edit.rt')->middleware("auth");
Route::post('/edit-rt-action', [RwController::class, 'edit_rt'])->name('edit.rt.action')->middleware("auth");
Route::get('/hapus_rt/{id_user}', [RwController::class, 'delete_rt'])->name('delete.rt.action')->middleware("admin");

Route::get('/hapus_pekerjaan/{id_pekerjaan}', [PekerjaanController::class, 'delete_pekerjaan'])->name('delete.pekerjaan')->middleware("auth");
Route::post('/edit-pekerjaan-action', [PekerjaanController::class, 'edit_pekerjaan'])->name('edit.pekerjaan.action')->middleware("auth");
Route::get('/edit_pekerjaan/{id_pekerjaan}', [HomeController::class, 'edit_pekerjaan'])->name('edit.pekerjaan')->middleware("auth");
Route::get('/detail_pekerjaan/{id_pekerjaan}', [HomeController::class, 'detail_pekerjaan'])->name('detail.pekerjaan')->middleware("auth");
Route::get('/data_pekerjaan', [HomeController::class, 'show_pekerjaan'])->name('show.pekerjaan')->middleware("auth");
Route::post('/tambah_pekerjaan', [PekerjaanController::class, 'create_pekerjaan'])->name('create.pekerjaan')->middleware("auth");

Route::post('/tambah_rt', [RwController::class, 'create_rt'])->name('create.rt')->middleware("auth");

Route::post('/edit_warga-action', [WargaController::class, 'edit_warga'])->name('edit.warga.action')->middleware("auth");
Route::get('/data_warga/{id_user}', [HomeController::class, 'show_warga'])->name('show.warga')->middleware("auth");
Route::get('/detail_warga/{id_warga}', [HomeController::class, 'detail_warga'])->name('detail.warga')->middleware("auth");
Route::get('/data_warga', [HomeController::class, 'show_warga_all'])->name('show.warga.all')->middleware("auth");
Route::get('/edit_warga/{id_warga}', [HomeController::class, 'edit_warga'])->name('edit.warga')->middleware("auth");
Route::get('/hapus_warga/{id_warga}', [WargaController::class, 'delete_warga'])->name('delete.warga')->middleware("auth");
Route::post('/tambah_warga', [WargaController::class, 'create_warga'])->name('create.warga')->middleware("auth");
// route data warga




Route::get('/chart_warga', [Controller::class, 'getChartData'])->name('chart.warga');


Route::get('/datawarga', function () {
    return view('Admin.pages.data_warga.data_warga');
});

Route::get('/detail-warga', function () {
    return view('Admin.pages.data_warga.detail_warga');
});

Route::get('/edit-warga', function () {
    return view('Admin.pages.data_warga.edit_warga');
});

// route data pekerjaan

Route::get('/data-pekerjaan', function () {
    return view('Admin.pages.data_pekerjaan.data_pekerjaan');
});

Route::get('/export/{id_user}', [ExcelController::class, 'export_warga'])->name('export.excel');
Route::get('/export_rt', [ExcelController::class, 'export_rt'])->name('export.rt.excel');
Route::get('/export_warga_all', [ExcelController::class, 'export_warga_all'])->name('export.warga.excel');

Route::post('/import', [ExcelController::class, 'import_warga'])->name('import.warga');


Route::get('/edit-pekerjaan', function () {
    return view('Admin.pages.data_pekerjaan.edit_pekerjaan');
});

// profile route

Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
Route::get('/ubah-password', [HomeController::class, 'ubah_password']);
Route::post('/edit_profile', [RwController::class, 'edit_profile'])->name('edit.profile');
// Route::get('/data-processing', function () {
//     return view('loading');
// })->middleware('show.loading');
