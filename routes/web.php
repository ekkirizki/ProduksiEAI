<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\absensi;
use App\Http\Controllers\budget;
use App\Http\Controllers\gudang;
use App\Http\Controllers\laporan_karyawan;
use App\Http\Controllers\pengeluaran;
use App\Http\Controllers\produksi;
use App\Http\Controllers\tambah_produksi;
use App\Http\Controllers\tambah_pengeluaran;
use App\Http\Controllers\laporan_produksi;

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

Route::get('/tambah_budget', function () {
    return view('tambah_budget');
})->name('tambah_budget');

Route::get('/home_produksi', function () {
    return view('v_produksi');
})->name('v_produksi');

Route::get('/gudang', function () {
    return view('gudang');
})->name('gudang');

Route::get('/about-us', function () {
    return view('aboutus');
})->name('aboutus');

// Route::get('/produksi', function () {
//     return view('produksi');
// })->name('produksi');

// Route::get('/absensi', function () {
//     return view('absensi');
// })->name('absensi');

Route::resource('absensi', absensi::class);
Route::resource('produksi', produksi::class);
Route::resource('laporan_produksi', laporan_produksi::class);
Route::resource('tambah_produksi', tambah_produksi::class);
Route::resource('laporan_karyawan', laporan_karyawan::class);
Route::resource('pengeluaran', pengeluaran::class);
Route::resource('tambah_pengeluaran', tambah_pengeluaran::class);
Route::resource('budget', budget::class);
Route::resource('gudang', gudang::class);
