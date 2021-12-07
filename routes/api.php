<?php

use App\Http\Controllers\Barang;
use App\Http\Controllers\Kategory;
use App\Http\Controllers\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('barang', Barang::class)->except(['create', 'edit']);
Route::resource('kategory', Kategory::class)->except(['create', 'edit']);
Route::resource('transaksi', Transaksi::class)->except(['create', 'edit']);
