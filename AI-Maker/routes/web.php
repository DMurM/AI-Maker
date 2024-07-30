<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;

// Ruta de la página principal
Route::get('/', function () {
    return view('welcome');
});

// Rutas protegidas por autenticación
Route::middleware(['auth'])->group(function () {
    // Dashboard del Usuario
    Route::get('/user_dashboard', [DashboardController::class, 'index'])->name('user_dashboard');
    // Ruta de logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    // Ruta de perfil
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    // Ruta de editar perfil
    Route::post('/profile', [ProfileController::class, 'updateProfile'])->name('profile.update'); //necesita ser revisado (work on process)
});

// Rutas de precios
Route::get('/pricing/monthly', [PricingController::class, 'showMonthly'])->name('pricing.monthly');
Route::get('/pricing/yearly', [PricingController::class, 'showYearly'])->name('pricing.yearly');
Route::get('/pricing/team', [PricingController::class, 'showTeam'])->name('pricing.team');
Route::get('/pricing/coins', [PricingController::class, 'showCoins'])->name('pricing.coins');

// Rutas de autenticación
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup');
Route::post('/signup', [AuthController::class, 'signup']);
Route::get('/password/reset', [AuthController::class, 'showPasswordResetForm'])->name('password.request');
Route::post('/password/email', [AuthController::class, 'sendPasswordResetLink'])->name('password.email');
