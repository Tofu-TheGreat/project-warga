<?php

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

// route dashboard

Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

Route::get('/home', function () {
    return view('pages.home');
});

Route::get('/datart', [HomeController::class, 'show_rt'])->name('show.rt');
Route::get('/data_warga/{id_user}', [HomeController::class, 'show_warga'])->name('show.warga');
Route::get('/testes/{id_user}', [HomeController::class, 'table_rt'])->name('show');
Route::get('/login', function () {
    return view('pages.login');
})->name('login');

Route::post('/login_action', [UserController::class, 'login'])->name('login.action');


// Rute yang hanya dapat diakses oleh Admin
Route::get('/datart', [HomeController::class, 'show_rt'])
    ->name('show.rt');


Route::get('/detail-rt/{id_user}', [HomeController::class, 'detail_rt'])->name('detail.rt');
Route::get('/edit-rt/{id_user}', [HomeController::class, 'edit_rt'])->name('edit.rt');
Route::post('/edit-rt-action', [RwController::class, 'edit_rt'])->name('edit.rt.action');
Route::get('/hapus_rt/{id_user}', [RwController::class, 'delete_rt'])->name('delete.rt.action');

Route::get('/hapus_pekerjaan/{id_pekerjaan}', [PekerjaanController::class, 'delete_pekerjaan'])->name('delete.pekerjaan');
Route::post('/edit-pekerjaan-action', [PekerjaanController::class, 'edit_pekerjaan'])->name('edit.pekerjaan.action');
Route::get('/edit_pekerjaan/{id_pekerjaan}', [HomeController::class, 'edit_pekerjaan'])->name('edit.pekerjaan');
Route::get('/detail_pekerjaan/{id_pekerjaan}', [HomeController::class, 'detail_pekerjaan'])->name('detail.pekerjaan');
Route::get('/data_pekerjaan', [HomeController::class, 'show_pekerjaan'])->name('show.pekerjaan');
Route::post('/tambah_pekerjaan', [PekerjaanController::class, 'create_pekerjaan'])->name('create.pekerjaan');

Route::post('/tambah_rt', [RwController::class, 'create_rt'])->name('create.rt');

Route::post('/edit_warga-action', [WargaController::class, 'edit_warga'])->name('edit.warga.action');
Route::get('/data_warga/{id_user}', [HomeController::class, 'show_warga'])->name('show.warga');
Route::get('/detail_warga/{id_warga}', [HomeController::class, 'detail_warga'])->name('detail.warga');
Route::get('/data_warga', [HomeController::class, 'show_warga_all'])->name('show.warga.all');
Route::get('/edit_warga/{id_warga}', [HomeController::class, 'edit_warga'])->name('edit.warga');
Route::get('/hapus_warga/{id_warga}', [WargaController::class, 'delete_warga'])->name('delete.warga');
Route::post('/tambah_warga', [WargaController::class, 'create_warga'])->name('create.warga');
// route data warga


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



Route::get('/edit-pekerjaan', function () {
    return view('Admin.pages.data_pekerjaan.edit_pekerjaan');
});

// profile route

Route::get('/profile', function () {
    return view('Pages.profile');
});
