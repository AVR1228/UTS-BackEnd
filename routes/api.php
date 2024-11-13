<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

Route::get('/news', [NewsController::class, 'index']); // Menampilkan semua berita
Route::post('/news', [NewsController::class, 'store']); // Menambahkan berita baru
Route::get('/news/{id}', [NewsController::class, 'show']); // Menampilkan berita berdasarkan ID
Route::put('/news/{id}', [NewsController::class, 'update']); // Mengupdate berita berdasarkan ID
Route::delete('/news/{id}', [NewsController::class, 'destroy']); // Menghapus berita berdasarkan ID