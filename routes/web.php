<?php

use App\Http\Controllers\HomeController;
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

Route::get('/home', function () {
    return view('pages.home');
});


Route::get('/tes', [HomeController::class, 'show'])->name('show');
Route::get('/testes/{id_user}', [HomeController::class, 'table_rt'])->name('show');
Route::get('/login', function () {
    return view('pages.login');
})->middleware('guest');
