<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GudangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(LoginController::class)->group(function () {
    Route::get('/', 'index');
});

Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'index');
});

Route::controller(ProdukController::class)->group(function () {
    Route::get('/produk', 'index');
    Route::get('/produk/create', 'create');
    Route::post('/produk/store', 'store');
    Route::get('/produk/edit/{id}', 'edit');
    Route::post('/produk/update/{id}', 'update');
    Route::delete('/produk/delete/{id}', 'destroy');
});

Route::controller(SupplierController::class)->group(function () {
    Route::get('/supplier', 'index');
    Route::get('/supplier/create', 'create');
    Route::post('/supplier/store', 'store');
    Route::get('/supplier/edit/{id}', 'edit');
    Route::post('/supplier/update/{id}', 'update');
    Route::delete('/supplier/delete/{id}', 'destroy');
});

Route::controller(KategoriController::class)->group(function () {
    Route::get('/kategori', 'index');
    Route::get('/kategori/create', 'create');
    Route::post('/kategori/store', 'store');
    Route::get('/kategori/edit/{id}', 'edit');
    Route::post('/kategori/update/{id}', 'update');
    Route::delete('/kategori/delete/{id}', 'destroy');
});

Route::controller(GudangController::class)->group(function () {
    Route::get('/gudang', 'index');
});

Route::controller(TokoController::class)->group(function () {
    Route::get('/toko', 'index');
});

Route::controller(LaporanController::class)->group(function () {
    Route::get('/laporan', 'index');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/users', 'index');
});

Route::controller(SettingController::class)->group(function () {
    Route::get('/setting', 'index');
});