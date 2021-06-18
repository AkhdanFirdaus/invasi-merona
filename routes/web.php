<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'welcome']);

Route::get('/artikel', [HomeController::class, 'artikel']);

Route::get('/artikel/{id}', [ArtikelController::class, 'show']);

Route::view('/covid', 'pages.home.covid');

Route::get('/vaksin', [HomeController::class, 'vaksin']);

Route::view('/tentang-kami', 'pages.home.tentang-kami');

Route::view('/login', 'pages.auth.login')->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/daftar', [PendaftaranController::class, 'daftar']);
Route::post('/daftar', [PendaftaranController::class, 'store'])->name('daftar.store');
Route::get('/daftar/{nik}/berhasil', [PendaftaranController::class, 'daftarBerhasil'])->name('daftar.berhasil');

Route::get('/profil', [HomeController::class, 'profil'])->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('logout', [AuthController::class, 'logout']);
    Route::view('dashboard', 'layouts.admin');
});

Route::prefix('dashboard')->group(function () {
    Route::resource('artikel', ArtikelController::class)->middleware('app:1&2');
    Route::view('covid', 'pages.dashboard.covid.index');
    Route::resource('vaksin', VaksinController::class)->middleware('app:1&2');
});

Route::get('/rumah-sakit', [RumahSakitController::class, 'index'])->middleware('app:1&2')->name('rumah-sakit.index');
Route::get('/rumah-sakit/profil', [RumahSakitController::class, 'profil'])->middleware('app:2')->name('rumah-sakit.profil');
Route::resource('/rumah-sakit', RumahSakitController::class)->except(['index'])->middleware('app:1');


Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
