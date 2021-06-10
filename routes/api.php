<?php

use App\Http\Controllers\api_pengeluaran;
use App\Http\Controllers\api_laporan_karyawan;
use App\Http\Controllers\api_produksi;
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

Route::apiResource('pengeluaran', api_pengeluaran::class);
Route::apiResource('produksi', api_produksi::class);
Route::apiResource('laporan_karyawan', api_laporan_karyawan::class);