<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RwController;
use App\Http\Controllers\UserController;
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

Route::get('/dashboard', function () {
    return view('Admin.Pages.dashboard');
});

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

Route::middleware(['auth', 'admin'])->group(function () {
});
Route::get('/datart', [HomeController::class, 'show_rt'])->name('show.rt');


Route::get('/detail-rt/{id_user}', [HomeController::class, 'detail_rt'])->name('detail.rt');
Route::get('/edit-rt/{id_user}', [HomeController::class, 'edit_rt'])->name('edit.rt');
Route::post('/edit-rt-action', [RwController::class, 'edit_rt'])->name('edit.rt.action');

Route::post('/tambah_rt', [RwController::class, 'create_rt'])->name('create.rt');

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

Route::get('/detail-pekerjaan', function () {
    return view('Admin.pages.data_pekerjaan.detail_pekerjaan');
});

Route::get('/edit-pekerjaan', function () {
    return view('Admin.pages.data_pekerjaan.edit_pekerjaan');
});
