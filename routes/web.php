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
    return view('Admin.Pages.dashboard');
});

Route::get('/home', function () {
    return view('pages.home');
});


Route::get('/datart', [HomeController::class, 'show_rt'])->name('show.rt');
Route::get('/testes/{id_user}', [HomeController::class, 'table_rt'])->name('show');
Route::get('/login', function () {
    return view('pages.login');
})->name('login');

Route::post('/login_action', [UserController::class, 'login'])->name('login.action');


// Rute yang hanya dapat diakses oleh Admin

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/datart', [HomeController::class, 'show_rt'])->name('show.rt');
});


Route::get('/testes/{id_user}', [HomeController::class, 'table_rt'])->name('show');

Route::post('/tambah_rt', [RwController::class, 'create_rt'])->name('create.rt');
