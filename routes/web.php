<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RwController;
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
    return view('pages.index');
});

Route::get('/detailrt', function () {
    return view('Admin.pages.data_rt.detail_rt');
});

Route::get('/editrt', function () {
    return view('Admin.pages.data_rt.edit_rt');
});

Route::get('/dashboard', function () {
    return view('Admin.Pages.dashboard');
});


Route::get('/datart', [HomeController::class, 'show_rt'])->name('show.rt');
Route::get('/testes/{id_user}', [HomeController::class, 'table_rt'])->name('show');
Route::get('/login', function () {
    return view('pages.login');
})->middleware('guest');
Route::post('/tambah_rt', [RwController::class, 'create_rt'])->name('create.rt');
