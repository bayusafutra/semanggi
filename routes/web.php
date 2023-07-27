<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LupaPasswordController;
use App\Http\Controllers\UbahPasswordController;

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

Route::get('/profilkampungsemanggi', function () {
    return view('profile');
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/signup', [SignupController::class, 'index'])->middleware('guest');
Route::post('/signup', [SignupController::class, 'store'])->middleware('guest');
Route::get('/verifikasi', [SignupController::class, 'verifikasi'])->middleware('guest');
Route::post('/verifikasi', [SignupController::class, 'postverifikasi'])->middleware('guest');
Route::get('/validasi', [SignupController::class, 'validasi'])->middleware('auth');
Route::post('/validasi', [SignupController::class, 'validasipost'])->middleware('auth');

Route::get('/lupapassword', [LupaPasswordController::class, 'index'])->middleware('guest');
Route::post('/lupapassword', [LupaPasswordController::class, 'lupapassword'])->middleware('guest');
Route::get('/resetpassword/{token}', [LupaPasswordController::class, 'resetpassword'])->name('reset.password.get')->middleware('guest');
Route::post('/resetpassword', [LupaPasswordController::class, 'resetpass'])->middleware('guest');

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login')->middleware('guest');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback')->middleware('guest');

Route::get('/ubahpassword', [UbahPasswordController::class, 'index'])->middleware('auth');
Route::post('/ubahpassword', [UbahPasswordController::class, 'store'])->middleware('auth');

Route::get('/detailproduk/{slug}', [BarangController::class, 'show']);

Route::get('/cart', [CartController::class, 'index'])->middleware('auth');
Route::post('/cart', [CartController::class, 'store'])->middleware('auth');
Route::post('/cart-remove', [CartController::class, 'destroy'])->middleware('auth');
Route::post('/update-cart', [CartController::class, 'updateCart'])->middleware('auth');
Route::post('/pesan', [CartController::class, 'nyoba'])->middleware('auth');

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

Route::get('/ubahAlamat', function () {
    return view('ubahAlamatPengiriman');
});

//////////////////////////ADMIN////////////////////////////
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('admin');

Route::get('/dash-kategori', [KategoriController::class, 'index'])->middleware('admin');
Route::get('/dash-buatkategori', [KategoriController::class, 'create'])->middleware('admin');
Route::post('/dash-buatkategori', [KategoriController::class, 'store'])->middleware('admin');
Route::get('/createslugkategori', [KategoriController::class, 'checkSlug'])->middleware('admin');
Route::get('/dash-daftarproduk/{slug}', [KategoriController::class, 'listprogram'])->name('programkategori')->middleware('admin');
Route::get('/dash-updatekategori/{slug}', [KategoriController::class, 'indexupdate'])->name('updatekategori')->middleware('admin');
Route::post('/dash-updatekategori', [KategoriController::class, 'update'])->middleware('admin');
Route::post('/dash-nonaktifkankategori', [KategoriController::class, 'nonaktif'])->middleware('admin');

Route::get('/dash-produk', [BarangController::class, 'index'])->middleware('admin');
Route::get('/dash-buatproduk', [BarangController::class, 'indexcreate'])->middleware('admin');
Route::post('/dash-buatproduk', [BarangController::class, 'store'])->middleware('admin');
Route::post('/dash-updatestok', [BarangController::class, 'updatestok'])->middleware('admin');
Route::post('/dash-updateproduk', [BarangController::class, 'update'])->middleware('admin');


