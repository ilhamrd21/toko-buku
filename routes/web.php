<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;

// === AUTH ROUTES ===
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginProses'])->name('login.proses');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// === ADMIN ROUTES ===
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        // CRUD Data Buku
        Route::resource('data-buku', BukuController::class);
    });

// === OWNER ROUTES ===
Route::middleware(['auth', 'role:owner'])
    ->prefix('owner')
    ->name('owner.')
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('owner.dashboard');
        })->name('dashboard');
    });

// === KASIR ROUTES ===
Route::middleware(['auth', 'role:kasir'])
    ->prefix('kasir')
    ->name('kasir.')
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('kasir.dashboard');
        })->name('dashboard');
    });
