<?php

use App\Models\Users;
use App\Models\cabang;
use App\Models\Kategori;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SuplierController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginWithGoogleController;

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
    //     Route::get('/dashboard', function () {
    //         $tot = DB::select('select t.id_cabang, sum(total) as total, sum(cash) as cash, sum(cashback) as cashback from transaction t 
    // left join cabangs c on t.id_cabang COLLATE utf8mb4_general_ci = t.id_cabang group by t.id_cabang');
    //         dd($tot);
    //         return view('dashboard', compact('tot'));
    //     })->name('dashboard');
});
Route::get('auth/google', [LoginWithGoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [LoginWithGoogleController::class, 'handleGoogleCallback']);

Route::middleware(['auth'])->group(function () {

    //dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //users
    Route::get('/users', [UsersController::class, 'index'])->name('users');
    Route::post('/proses_add_users', [UsersController::class, 'proses_add_users'])->name('proses_add_users');
    Route::post('/proses_edit_users', [UsersController::class, 'proses_edit_users'])->name('proses_edit_users');
    Route::get('/delete_users/users/{id}', [UsersController::class, 'delete_users'])->name('users.delete_users');

    //product
    Route::get('/product', [ProductController::class, 'index'])->name('product');
    Route::get('/add_product', [ProductController::class, 'add_product'])->name('add_product');
    Route::post('/proses_add_product', [ProductController::class, 'proses_add_product'])->name('proses_add_product');
    Route::post('/proses_edit_product', [ProductController::class, 'proses_edit_product'])->name('proses_edit_product');
    Route::get('/exportexcel', [ProductController::class, 'export'])->name('exportexcel');
    Route::get('/exportcsv', [ProductController::class, 'exportcsv'])->name('exportcsv');
    Route::get('/delete_product/product/{id}', [ProductController::class, 'delete_product'])->name('product.delete_product');


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
    Route::post('/proses_edit_satuan', [SatuanController::class, 'proses_edit_satuan'])->name('proses_edit_satuan');
    Route::get('/delete_satuan/satuan/{id}', [SatuanController::class, 'delete_satuan'])->name('satuan.delete');

    //cabang
    Route::get('/cabang', [CabangController::class, 'index'])->name('cabang');
    Route::post('/proses_add_cabang', [CabangController::class, 'proses_add_cabang'])->name('proses_add_cabang');
    Route::post('/proses_edit_cabang', [CabangController::class, 'proses_edit_cabang'])->name('proses_edit_cabang');
    Route::get('/delete_cabang/cabang/{id}', [CabangController::class, 'delete_cabang'])->name('cabang.delete');

    //suplier
    Route::get('/suplier', [SuplierController::class, 'index'])->name('suplier');
    Route::post('/proses_add_suplier', [SuplierController::class, 'proses_add_suplier'])->name('proses_add_suplier');
    Route::post('/proses_edit_suplier', [SuplierController::class, 'proses_edit_suplier'])->name('proses_edit_suplier');
    Route::get('/delete_suplier/suplier/{id}', [SuplierController::class, 'delete_suplier'])->name('suplier.delete');

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

    //laporan
    Route::get('/struck', [ProductController::class, 'laporan_struck'])->name('struck');
});
