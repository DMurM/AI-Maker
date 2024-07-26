<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pricing/monthly', [PricingController::class, 'showMonthly'])->name('pricing.monthly');
Route::get('/pricing/yearly', [PricingController::class, 'showYearly'])->name('pricing.yearly');
Route::get('/pricing/team', [PricingController::class, 'showTeam'])->name('pricing.team');
Route::get('/pricing/coins', [PricingController::class, 'showCoins'])->name('pricing.coins');

// Rutas de autenticación
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup');
Route::post('/signup', [AuthController::class, 'signup']);
Route::get('/password/reset', [AuthController::class, 'showPasswordResetForm'])->name('password.request'); //Falta revisar Low passwords recovery
Route::post('/password/email', [AuthController::class, 'sendPasswordResetLink'])->name('password.email');
