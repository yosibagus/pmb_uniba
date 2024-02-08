<?php

use App\Http\Controllers\BeasiswaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\KategoriController;
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

Route::get('/', [HomeController::class, 'index']);

Route::get('/home', [HomeController::class, 'index']);
Route::get('/kategori', [KategoriController::class, 'index']);
Route::post('/kategori', [KategoriController::class, 'tambah_action']);
Route::get('/kategori/{id}/hapus', [KategoriController::class, 'hapus']);
Route::post('/kategori/{id}/edit', [KategoriController::class, 'edit_action']);

//informasi
Route::get('/info', [InformasiController::class, 'index']);
Route::get('/info/{id}', [InformasiController::class, 'detail']);
Route::get('/informasi/tambah', [InformasiController::class, 'tambah']);
Route::post('/informasi/tambah', [InformasiController::class, 'tambah_action']);

Route::post('/upload', [InformasiController::class, 'upload'])->name('ckeditor.upload');

Route::get('/informasi/{id}/hapus', [InformasiController::class, 'hapus']);

//beasiswa
Route::get('/beasiswa', [BeasiswaController::class, 'index']);
Route::get('/beasiswa/tambah', [BeasiswaController::class, 'tambah']);
Route::post('/beasiswa/tambah', [BeasiswaController::class, 'tambah_action']);
