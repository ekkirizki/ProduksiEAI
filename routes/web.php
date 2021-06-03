<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\absensi;
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

// Route::get('/produksi', function () {
//     return view('produksi');
// })->name('produksi');

// Route::get('/absensi', function () {
//     return view('absensi');
// })->name('absensi');

Route::resource('absensi', absensi::class);
Route::resource('produksi', produksi::class);
