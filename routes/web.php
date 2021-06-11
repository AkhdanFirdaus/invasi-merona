<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\AuthController;
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

Route::middleware(['auth'])->group(function () {
    Route::get('logout', [AuthController::class, 'logout']);
});

Route::get('/', function () {
    return view('pages.welcome');
});

Route::get('/artikel', function () {
    return view('pages.artikel');
});

Route::get('/artikel/{id}', [ArtikelController::class, 'detail']);

Route::get('/covid', function () {
    return view('pages.covid');
});

Route::get('/vaksin', function () {
    return view('pages.vaksin');
});

Route::get('/tentang-kami', function () {
    return view('pages.tentang-kami');
});

Route::get('/login', function () {
    return view('pages.auth.login');
});

Route::post('/login', [AuthController::class, 'login']);
