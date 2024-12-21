<?php

use App\Http\Controllers\DonaturController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\cekAdmin;
use App\Http\Middleware\cekLogin;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\DonasiController;

Route::get('/api/news', [NewsController::class, 'getNews']);



Route::get('/', function () {
    return view('index');
});

Route::get('/donasi', [DonaturController::class, 'donasi']);
Route::get('/donatur', [DonaturController::class, 'tampildonatur']);

Route::middleware([cekLogin::class])->group(function () {
    Route::get('/pembayaran', [DonaturController::class, 'create']);
});

Route::resource('donaturs', DonaturController::class);
Route::middleware([cekAdmin::class])->group(function () {
    Route::get('/dashboard', [DonaturController::class, 'index']);
});

// SESI LOGIN
Route::get('/session', [SessionController::class, 'index']);
Route::post('/session/login', [SessionController::class, 'login']);

Route::get('/session/register', [SessionController::class, 'register']);
Route::post('/session/create', [SessionController::class, 'create']);

Route::get('/session/logout', [SessionController::class, 'logout']);

//BARU
Route::resource('donasi', DonasiController::class);
Route::get('/donasi', [DonasiController::class, 'index'])->name('donasi');
Route::get('/donasi/{id}', [DonasiController::class, 'show'])->name('donasi.show');
Route::get('/donatur', [DonaturController::class, 'tampilDonatur'])->name('donatur');
Route::get('/donasi/create', [DonasiController::class, 'create'])->name('donasi.create');
Route::get('/donasi', [DonasiController::class, 'index'])->name('donasi.donasi');
