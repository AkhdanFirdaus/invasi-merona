<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\RumahSakitController;
use App\Http\Controllers\VaksinController;
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

Route::view('/', 'pages.home.welcome');

Route::view('/artikel', 'pages.home.artikel');

Route::get('/artikel/{id}', [ArtikelController::class, 'show']);

Route::view('/covid', 'pages.home.covid');

Route::view('/vaksin', 'pages.home.vaksin');

Route::view('/tentang-kami', 'pages.home.tentang-kami');

Route::view('/login', 'pages.auth.login')->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::view('/daftar', 'pages.home.daftar');
Route::view('/daftar/berhasil', 'pages.home.daftar-berhasil');

Route::middleware(['auth'])->group(function () {
    Route::get('logout', [AuthController::class, 'logout']);
    Route::view('dashboard', 'layouts.admin');
});

Route::prefix('dashboard')->group(function () {
    Route::resource('artikel', ArtikelController::class)->middleware('adminApp', 'adminRS');
    Route::view('covid', 'pages.dashboard.covid.index');
    Route::resource('vaksin', VaksinController::class)->middleware('adminApp', 'adminRS');
});

Route::get('/rumah-sakit', [RumahSakitController::class, 'index'])->middleware('adminApp', 'adminRS');
Route::resource('/rumah-sakit', RumahSakitController::class)->except([])->middleware('adminRS');
