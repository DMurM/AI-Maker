<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AiToolsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PaymentController2;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImageGenerationController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/', function () {
//     return view('admin.admin_dashboard');
// });

Route::middleware(['auth'])->group(function () {
    Route::get('/user_dashboard', [DashboardController::class, 'index'])->name('user_dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    //Route::post('/profile', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::get('/payments', [PaymentController::class, 'index'])->name('payment');
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

Route::get('/ai-tools/image-generator', [AiToolsController::class, 'showImageGenerator'])->name('ai-tools.image-generator');
Route::get('/ai-tools/background-remover', [AiToolsController::class, 'showBackgroundRemove'])->name('ai-tools.background-remover');
Route::get('/ai-tools/image-to-video', [AiToolsController::class, 'showImageToVideo'])->name('ai-tools.image-to-video');
Route::get('/ai-tools/text-to-speech', [AiToolsController::class, 'showTextToSpeech'])->name('ai-tools.text-to-speech');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup');
Route::post('/signup', [AuthController::class, 'signup']);
Route::get('/password/reset', [AuthController::class, 'showPasswordResetForm'])->name('password.request');
Route::post('/password/email', [AuthController::class, 'sendPasswordResetLink'])->name('password.email');

Route::get('/image-generation', [DashboardController::class, 'showImageGeneration'])->name('image_generation.form');
Route::post('/generate_image', [ImageGenerationController::class, 'generateImage'])->name('generate_image');

Route::resource('users', UserController::class);
