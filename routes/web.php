<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PenjualandetailController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('dashboard');
});

Route::resource('penjualan', PenjualanController::class);
Route::resource('barang', BarangController::class);


Route::get('penjualandetail/{id}/create', [PenjualandetailController::class, 'create'])->name('penjualandetail.create');


Route::post('penjualandetail', [PenjualandetailController::class, 'store'])->name('penjualandetail.store');
Route::get('penjualandetail/{id}/list', [PenjualandetailController::class, 'list'])->name('penjualandetail.list');
Route::delete('penjualandetail/{detail_id}/delete/{penjualan_id}', [PenjualandetailController::class, 'destroy'])->name('penjualandetail.destroy');
Route::get('penjualandetail/{id}/lunas', [PenjualandetailController::class, 'setLunas'])->name('penjualandetail.lunas');

Route::get('/search-barang', [BarangController::class, 'search'])->name('search.barang');
