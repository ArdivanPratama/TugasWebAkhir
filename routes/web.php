<?php

use App\Http\Controllers\Barang;
use App\Http\Controllers\UploadController;
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

Route::get('/', function () {
    return view('welcome');
})
    ->middleware(['auth']);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/barang', [Barang::class, 'index'])->name('barang');
    Route::get('/addbarang', [Barang::class, 'create'])->name('addbarang');
    Route::post('/addbarang', [Barang::class, 'store'])->name('addbarang');
    Route::delete('/deletebarang/{id}', [Barang::class, 'destroy'])->name('deletebarang');
    Route::get('/editbarang/{id}', [Barang::class, 'edit'])->name('editbarang');
    Route::put('/updatebarang/{id}', [Barang::class, 'update'])->name('updatebarang');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/upload', [UploadController::class, 'upload'])->name('upload');
    Route::post('/upload/proses', [UploadController::class, 'proses_upload'])->name('proses_upload');
});

require __DIR__ . '/auth.php';
