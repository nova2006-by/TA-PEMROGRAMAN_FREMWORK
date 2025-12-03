<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\PerpusController;
use App\Http\Controllers\LoginController;

use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Session\Middleware\StartSession;

Route::middleware([
    EncryptCookies::class,
    AddQueuedCookiesToResponse::class,
    StartSession::class,
])->group(function () {

    // Halaman login (guest)
    Route::middleware('guest')->group(function () {
        Route::get('/login', [PerpusController::class, 'login'])->name('login');
        Route::post('/login', [LoginController::class, 'authenticate']);
    });

    // Halaman utama
    Route::get('/', function () {
        return redirect('/perpus');
    })->middleware('auth');

    // Semua ROUTE yang membutuhkan login
    Route::middleware('auth')->group(function () {

        // Buku
        Route::get('/buku', [BukuController::class, 'index']);
        Route::get('/buku/add', [BukuController::class, 'add_new']);
        Route::post('/buku/save', [BukuController::class, 'save'])->name('buku.save');
        Route::get('/buku/edit/{id}', [BukuController::class, 'edit']);
        Route::get('/buku/delete/{id}', [BukuController::class, 'delete']);

        // Anggota
        Route::get('/anggota', [AnggotaController::class, 'index']);
        Route::get('/anggota/add', [AnggotaController::class, 'add']);
        Route::post('/anggota/save', [AnggotaController::class, 'save']);
        Route::get('/anggota/edit/{id}', [AnggotaController::class, 'edit']);
        Route::get('/anggota/delete/{id}', [AnggotaController::class, 'delete']);

        // Pinjam
        Route::get('/pinjam', [PinjamController::class, 'index']);
        Route::get('/pinjam/add', [PinjamController::class, 'add']);
        Route::post('/pinjam/save', [PinjamController::class, 'save']);
        Route::get('pinjam/edit/{id}', [PinjamController::class, 'edit']);
        Route::post('pinjam/update/{id}', [PinjamController::class, 'update']);
        Route::delete('pinjam/delete/{id}', [PinjamController::class, 'delete']);


        // Dashboard Perpus
        Route::get('/perpus', [PerpusController::class, 'index']);

        // Logout
        Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    });

});
