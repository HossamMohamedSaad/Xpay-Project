<?php

use App\Http\Controllers\AuthClient\AuthenticatedSessionController;
use App\Http\Controllers\AuthClient\ConfirmablePasswordController;
use App\Http\Controllers\AuthClient\EmailVerificationNotificationController;
use App\Http\Controllers\AuthClient\EmailVerificationPromptController;
use App\Http\Controllers\AuthClient\NewPasswordController;
use App\Http\Controllers\AuthClient\PasswordController;
use App\Http\Controllers\AuthClient\PasswordResetLinkController;
use App\Http\Controllers\AuthClient\RegisteredUserController;
use App\Http\Controllers\AuthClient\VerifyEmailController;
use Illuminate\Support\Facades\Route;

// Route::middleware('guest')->group(function () {
   Route::get('client/register', [RegisteredUserController::class, 'create'])
        ->name('client.register');

    Route::post('client/register', action: [RegisteredUserController::class, 'store']);

    Route::get('client/login', [AuthenticatedSessionController::class, 'create'])
        ->name('client.login');

    Route::post('client/login', [AuthenticatedSessionController::class, 'store'])
        ->name('client.check');

    Route::get('client/forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('client.password.request');

    Route::post('client/forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('client.password.email');

    Route::get('client/reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('client.password.reset');

    Route::post('client/reset-password', [NewPasswordController::class, 'store'])
        ->name('client.password.store');
// });

Route::middleware('auth:client')->group(function () {
    Route::get('client/verify-email', EmailVerificationPromptController::class)
        ->name('client.verification.notice');

    Route::get('client/verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('client.verification.verify');

    Route::post('client/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('client.verification.send');

    Route::get('client/confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('client.password.confirm');

    Route::post('client/confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('client/password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('client/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('client.logout');
});
