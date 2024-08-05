<?php

use App\Http\Controllers\PaymentController;
use Faker\Provider\ar_EG\Payment;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImageGenerationController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/user_dashboard', [DashboardController::class, 'index'])->name('user_dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    // Ruta de perfil
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    // Ruta de pagos perfil
    Route::get('/payment', [PaymentController::class, 'index'])->name('payment');
});

Route::get('/pricing/monthly', [PricingController::class, 'showMonthly'])->name('pricing.monthly');
Route::get('/pricing/yearly', [PricingController::class, 'showYearly'])->name('pricing.yearly');
Route::get('/pricing/team', [PricingController::class, 'showTeam'])->name('pricing.team');
Route::get('/pricing/coins', [PricingController::class, 'showCoins'])->name('pricing.coins');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup');
Route::post('/signup', [AuthController::class, 'signup']);
Route::get('/password/reset', [AuthController::class, 'showPasswordResetForm'])->name('password.request');
Route::post('/password/email', [AuthController::class, 'sendPasswordResetLink'])->name('password.email');

Route::get('/image-generation', [DashboardController::class, 'showImageGeneration'])->name('image_generation.form');
Route::post('/generate_image', [ImageGenerationController::class, 'generateImage'])->name('generate_image');
