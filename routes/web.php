<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\EducateController;
use Illuminate\Support\Facades\Route;

Route::get('/auth/login', [AuthController::class, 'loginIndex'])->name('loginIndex');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/auth/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register/post', [AuthController::class, 'regis'])->name('regis-post');

Route::middleware(['Autentikasi'])->group(function () {
    Route::get('/', [BerandaController::class, 'index'])->name('dashboard');
    Route::get('/page-2', [EducateController::class, 'index'])->name('page2');
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::post('/educate/store', [EducateController::class, 'store'])->name('educate-store');
    Route::post('/educate/update/{id}', [EducateController::class, 'update'])->name('educate-update');
    Route::post('/profile/update/{id}', [AuthController::class, 'update'])->name('edit-profile');
    Route::post('/educate/delete/{id}', [EducateController::class, 'destroy'])->name('educate-delete');
    Route::get('/export/pdf', [EducateController::class, 'ExportPdf'])->name('export.pdf');
    Route::get('/export/csv', [EducateController::class, 'ExportCsv'])->name('export.csv');

});
