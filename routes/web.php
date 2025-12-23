<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\EducateController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BerandaController::class, 'index'])->name('dashboard');
Route::get('/page-2', [EducateController::class, 'index'])->name('page2');
Route::get('/auth/login', [AuthController::class, 'loginIndex'])->name('loginIndex');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
