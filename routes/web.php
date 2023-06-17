<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\CatalogController;

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

Route::get('/', [HomeController::class, 'index']);


Route::get('/catalog', [CatalogController::class, 'index']);

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/signup', [SignupController::class, 'index'])->middleware('guest');
Route::post('/signup', [SignupController::class, 'store'])->middleware('guest');

Route::get('/detailproduk/{slug}', [BarangController::class, 'show']);

Route::get('/cart', [CartController::class, 'index'])->middleware('auth');
Route::post('/cart', [CartController::class, 'store'])->middleware('auth');

Route::post('/update', [CartController::class, 'update'])->middleware('auth');

Route::post('/remove', [CartController::class, 'destroy'])->middleware('auth');

//tolong lebokno bayy ehehehe
Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('/pembayaran', function () {
    return view('pembayaran');
});

Route::get('/pembayaran/kode-unik', function () {
    return view('kodepembayaran');
});

Route::get('/admin/home', function () {
    return view('layouts.navbarAdm');
});

Route::get('/ubahAlamat', function () {
    return view('ubahAlamatPengiriman');
});
