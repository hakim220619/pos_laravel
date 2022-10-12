<?php

use App\Http\Controllers\CabangController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginWithGoogleController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\SuplierController;
use App\Http\Controllers\UsersController;
use App\Models\cabang;
use App\Models\Kategori;
use App\Models\Users;

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
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('auth/google', [LoginWithGoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [LoginWithGoogleController::class, 'handleGoogleCallback']);

Route::middleware(['auth'])->group(function () {

    //users
    Route::get('/users', [UsersController::class, 'index'])->name('users');

    //product
    Route::get('/product', [ProductController::class, 'index'])->name('product');
    Route::get('/add_product', [ProductController::class, 'add_product'])->name('add_product');
    Route::post('/proses_add_product', [ProductController::class, 'proses_add_product'])->name('proses_add_product');
    Route::get('/exportexcel', [ProductController::class, 'export'])->name('exportexcel');
    Route::get('/exportcsv', [ProductController::class, 'exportcsv'])->name('exportcsv');


    //kategori
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');
    Route::get('/search', [KategoriController::class, 'search'])->name('search');
    Route::any('/kategori', [KategoriController::class, 'selectkategori'])->name('selectkategori');
    Route::get('/add_kategori', [KategoriController::class, 'add_kategori'])->name('add_kategori');
    Route::post('/proses_add_kategori', [KategoriController::class, 'proses_add_kategori'])->name('proses_add_kategori');
    Route::post('/proses_edit_kategori', [KategoriController::class, 'proses_edit_kategori'])->name('proses_edit_kategori');
    Route::get('/delete/kategori/{id}', [KategoriController::class, 'delete'])->name('kategori.delete');

    //satuan
    Route::get('/satuan', [SatuanController::class, 'index'])->name('satuan');
    Route::get('/search_satuan', [SatuanController::class, 'search_satuan'])->name('search_satuan');
    Route::post('/proses_add_satuan', [SatuanController::class, 'proses_add_satuan'])->name('proses_add_satuan');

    //cabang
    Route::get('/cabang', [CabangController::class, 'index'])->name('cabang');
    Route::post('/proses_add_cabang', [CabangController::class, 'proses_add_cabang'])->name('proses_add_cabang');

    //suplier
    Route::get('/suplier', [SuplierController::class, 'index'])->name('suplier');
    Route::post('/proses_add_suplier', [SuplierController::class, 'proses_add_suplier'])->name('proses_add_suplier');

    //orders
    Route::get('/orders', [OrderController::class, 'index'])->name('orders');
    Route::get('/load_data', [OrderController::class, 'load_data'])->name('load_data');
    Route::get('/load_data_product', [OrderController::class, 'load_data_product'])->name('load_data_product');
    Route::get('/add_orders', [OrderController::class, 'add_orders'])->name('add_orders');
    Route::get('/jumlah', [OrderController::class, 'add_jumlah'])->name('order.jumlah');
    Route::get('/changejumlah', [OrderController::class, 'changejumlah'])->name('order.change.jml');
    Route::get('/gettotal', [OrderController::class, 'gettotal'])->name('order.gettotal');
    Route::get('/add_orderdfix', [OrderController::class, 'add_orderdfix'])->name('order.add_orderdfix');

    Route::get('/orders/delete', [OrderController::class, 'delete'])->name('orders.delete');
    Route::get('/orders/batal', [OrderController::class, 'batal'])->name('orders.batal');
});
