<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentController2;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImageGenerationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RemoveBackgroundController;

// Ruta de inicio
Route::get('/', function () {
    return view('welcome');
});

// Rutas protegidas por autenticación
Route::middleware(['auth'])->group(function () {
    Route::get('/user_dashboard', [DashboardController::class, 'index'])->name('user_dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/assets', [DashboardController::class, 'showAssets'])->name('assets');
    Route::get('/remove-background', [RemoveBackgroundController::class, 'showForm'])->name('remove_background.form');
    Route::get('/video-tools', [DashboardController::class, 'showVideoTools'])->name('video_tools');
    Route::get('/audio-tools', [DashboardController::class, 'showAudioTools'])->name('audio_tools');
    Route::get('/payment', [PaymentController2::class, 'showPaymentForm'])->name('payment.form');
    Route::post('/process-payment', [PaymentController2::class, 'processPayment'])->name('process.payment');
    Route::get('/payment/success', function () {
        return view('payment.success');
    })->name('payment.success');
    Route::get('/payment/failure', function () {
        return view('payment.failure');
    })->name('payment.failure');
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

Route::resource('users', UserController::class);
