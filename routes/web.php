<?php

use App\Http\Controllers\AlamatController;
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
use App\Http\Controllers\PesananController;
use App\Http\Controllers\UbahPasswordController;
use App\Http\Controllers\ProfileController;

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

Route::get('/profilpengguna', [ProfileController::class, 'index'])->middleware('auth');
Route::get('/editprofile', [ProfileController::class, 'edit'])->middleware('auth');
Route::post('/editprofile', [ProfileController::class, 'update'])->middleware('auth');

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

Route::post('/pesan', [PesananController::class, 'store'])->middleware('auth');
Route::post('/pesanproduk', [PesananController::class, 'create'])->middleware('auth');
Route::get('/detailpesanan/{slug}', [PesananController::class, 'index'])->middleware('auth');

Route::get('/ubahAlamat/{slug}', [AlamatController::class, 'index'])->middleware('auth');
Route::get('/tambahAlamat', [AlamatController::class, 'edit'])->middleware('auth');
Route::get('inputProvinsi', [AlamatController::class, 'provinsi'])->name('pilihProv');
Route::get('inputKota/{id}', [AlamatController::class, 'regency'])->name('pilihKota');
Route::get('inputKecamatan/{id}', [AlamatController::class, 'district'])->name('pilihKecamatan');
Route::get('inputKelurahan/{id}', [AlamatController::class, 'village'])->name('pilihKelurahan');
Route::get('inputKodePos/{id}', [AlamatController::class, 'kodepos'])->name('pilihKodePos');
Route::post('/createalamat', [AlamatController::class, 'store'])->middleware('auth');

Route::get('/pembayaran', function () {
    return view('pembayaran');
});

Route::get('/pembayaran/kode-unik', function () {
    return view('kodepembayaran');
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


