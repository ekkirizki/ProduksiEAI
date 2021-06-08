<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\absensi;
use App\Http\Controllers\laporan_karyawan;
use App\Http\Controllers\pengeluaran;
use App\Http\Controllers\produksi;

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
    return view('home');
})->name('home');

Route::get('/karyawan', function () {
    return view('karyawan');
})->name('karyawan');

Route::get('/performa', function () {
    return view('performance');
})->name('performa');

Route::get('/keuangan', function () {
    return view('keuangan');
})->name('keuangan');

// Route::get('/produksi', function () {
//     return view('produksi');
// })->name('produksi');

// Route::get('/absensi', function () {
//     return view('absensi');
// })->name('absensi');

Route::resource('absensi', absensi::class);
Route::resource('produksi', produksi::class);
Route::resource('laporan_karyawan', laporan_karyawan::class);
Route::resource('pengeluaran', pengeluaran::class);

