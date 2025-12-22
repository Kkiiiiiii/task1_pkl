<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\EducateController;
use Illuminate\Support\Facades\Route;

Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda');
Route::get('/page-2', [EducateController::class, 'index'])->name('page2');
