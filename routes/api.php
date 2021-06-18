<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\CovidController;
use App\Http\Controllers\RumahSakitController;
use App\Http\Controllers\VaksinController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/covid-summary', [CovidController::class, 'summaryApi']);

Route::get('/artikel-list', [ArtikelController::class, 'datalist']);

Route::get('/vaksin-list', [VaksinController::class, 'datalist']);

Route::get('/rumah-sakit-list', [RumahSakitController::class, 'datalist']);

Route::post('/info-rs', [RumahSakitController::class, 'infors']);
