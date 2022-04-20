<?php

use App\Http\Controllers\ContohController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CobaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;

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
    return view('welcome');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/users/show/{id}', [App\Http\Controllers\UserController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {

    Route::group(['prefix' => 'bahanbaku'], function () {
        Route::get('/', [App\Http\Controllers\BahanBakuController::class, 'index'])->name('bahan_baku');
        Route::get('/create', [App\http\Controllers\BahanBakuController::class, 'create'])->name('bahan_baku.create');
        Route::post('/create', [App\Http\Controllers\BahanBakuController::class, 'store'])->name('bahan_baku.create');
        Route::get('/edit/{id}', [App\Http\Controllers\BahanBakuController::class, 'edit'])->name('bahan_baku.edit');
        Route::post('/edit/{id}', [App\Http\Controllers\BahanBakuController::class, 'update'])->name('bahan_baku.edit');
        Route::get('/delete/{id}', [App\Http\Controllers\BahanBakuController::class, 'delete'])->name('bahan_baku.delete');
    });
    Route::group(['prefix' => 'stokbahanbakuharians'], function () {
        Route::get('/', [App\Http\Controllers\StokBahanBakuHarianController::class, 'index'])->name('stokbahanbakuharian');
        Route::get('/create', [App\Http\Controllers\StokBahanBakuHarianController::class, 'create'])->name('stokbahanbakuharian.create');
        Route::post('/create', [App\Http\Controllers\StokBahanBakuHarianController::class, 'store'])->name('stokbahanbakuharian.create');
        Route::get('/edit/{date}', [App\Http\Controllers\StokBahanBakuHarianController::class, 'edit'])->name('stokbahanbakuharian.edit');
        Route::post('/edit/{date}', [App\Http\Controllers\StokBahanBakuHarianController::class, 'store'])->name('stokbahanbakuharian.edit');
        Route::get('/delete/{date}', [App\Http\Controllers\StokBahanBakuHarianController::class, 'delete'])->name('stokbahanbakuharian.delete');
    });
    Route::get('/logout', function () {
        auth()->logout();
        return redirect()->route('home');
    });

    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/produk', [DashboardController::class, 'produk'])->name('dashboard.produk');
    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('user');
        Route::get('/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
        Route::post('/create', [App\Http\Controllers\UserController::class, 'store'])->name('user.create');

        Route::get('/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
        Route::post('/edit/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user.edit');
        Route::get('/delete/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('user.delete');
    });
    Route::group(['prefix' => 'pabriks'], function () {
        Route::get('/', [App\Http\Controllers\PabrikController::class, 'index'])->name('pabrik');
        // Route::get('//show/{id}', [App\Http\Controllers\PabrikController::class, 'index'])->name('home');
        Route::get('/create', [App\Http\Controllers\PabrikController::class, 'create'])->name('pabrik.create');
        Route::post('/create', [App\Http\Controllers\PabrikController::class, 'store'])->name('pabrik.create');

        Route::get('/edit/{id}', [App\Http\Controllers\PabrikController::class, 'edit'])->name('pabrik.edit');
        Route::post('/edit/{id}', [App\Http\Controllers\PabrikController::class, 'update'])->name('pabrik.edit');
        Route::get('/delete/{id}', [App\Http\Controllers\PabrikController::class, 'delete'])->name('pabrik.delete');
    });
    Route::group(['prefix' => 'produks'], function () {
        Route::get('/', [App\Http\Controllers\ProdukController::class, 'index'])->name('produk');
        Route::get('/create', [App\Http\Controllers\ProdukController::class, 'create'])->name('produk.create');
        Route::post('/create', [App\Http\Controllers\ProdukController::class, 'store'])->name('produk.create');
        // Route::post('/store', [App\Http\Controllers\ProdukController::class, 'store'])->name('home');
        Route::get('/edit/{id}', [App\Http\Controllers\ProdukController::class, 'edit'])->name('produk.edit');
        Route::post('/edit/{id}', [App\Http\Controllers\ProdukController::class, 'update'])->name('produk.edit');
        Route::get('/delete/{id}', [App\Http\Controllers\ProdukController::class, 'delete'])->name('produk.delete');
    });
    Route::group(['prefix' => 'produksvarian'], function () {
        Route::get('/', [App\Http\Controllers\ProdukVarianController::class, 'index'])->name('produkvarian');
        Route::get('/create', [App\Http\Controllers\ProdukVarianController::class, 'create'])->name('produkvarian.create');
        Route::post('/create', [App\Http\Controllers\ProdukVarianController::class, 'store'])->name('produkvarian.create');
        Route::get('/edit/{id}', [App\Http\Controllers\ProdukVarianController::class, 'edit'])->name('produkvarian.edit');
        Route::post('/edit/{id}', [App\Http\Controllers\ProdukVarianController::class, 'update'])->name('produkvarian.edit');

        Route::get('/delete/{id}', [App\Http\Controllers\ProdukVarianController::class, 'delete'])->name('produkvarian.delete');
    });
    Route::group(['prefix' => 'dataproduksharian'], function () {
        Route::get('/', [App\Http\Controllers\DataProdukHarianController::class, 'index'])->name('dataprodukharian');
        Route::get('/create', [App\Http\Controllers\DataProdukHarianController::class, 'create'])->name('dataprodukharian.create');
        Route::post('/create', [App\Http\Controllers\DataProdukHarianController::class, 'store'])->name('dataprodukharian.create');
        Route::get('/edit/{id}', [App\Http\Controllers\DataProdukHarianController::class, 'edit'])->name('dataprodukharian.edit');
        Route::post('/edit/{id}', [App\Http\Controllers\DataProdukHarianController::class, 'update'])->name('dataprodukharian.edit');
        Route::get('/delete/{id}', [App\Http\Controllers\DataProdukHarianController::class, 'delete'])->name('dataprodukharian.delete');
    });

    Route::get('/rekapdataproduk', [App\Http\Controllers\RekapDataProdukController::class, 'index'])->name('rekapdataproduk');
    Route::get('/rekapdataprodukvarian', [App\Http\Controllers\RekapDataProdukVarianController::class, 'index'])->name('rekapdataprodukvarian');
});
