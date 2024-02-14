<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;



Route::middleware('guest')->group(function () {
    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::get('/login', [LoginController::class, 'index'])->name('admin.login');
    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login');

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

