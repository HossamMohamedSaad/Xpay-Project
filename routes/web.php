<?php

use App\Http\Controllers\admin\clientController;
use App\Http\Controllers\admin\paymentController;
use App\Http\Controllers\admin\planController;
use App\Http\Controllers\admin\subscribtionController;
use App\Http\Controllers\admin\userController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;




Route::prefix('admin/dashboard')
    ->name('admin.dashboard.')
    ->middleware('auth:web')
    ->group(function () {
        Route::get('/index', [\App\Http\Controllers\admin\dashboardController::class, 'index'])->name('index');
    });

Route::prefix('admin/plan')
    ->middleware('auth:web')
    ->name('admin.plan.')
    ->group(function () {

        Route::get('/index', [planController::class, 'index'])->name('index');
        Route::get('/add', [PlanController::class, 'add'])->name('add');
        Route::put('/create', [PlanController::class, 'create'])->name('create');
        Route::patch('/update', [PlanController::class, 'update'])->name('update');
        Route::delete('/delete', [PlanController::class, 'destroy'])->name('destroy');
    });

Route::prefix('admin/client')
    ->middleware('auth:web')
    ->name('admin.client.')
    ->group(function () {

        Route::get('/index', [clientController::class, 'index'])->name('index');
        Route::get('/show', [clientController::class, 'show'])->name('show');
        Route::get('/add', [clientController::class, 'add'])->name('add');
        Route::put('/create', [clientController::class, 'create'])->name('create');
        Route::patch('/update', [clientController::class, 'update'])->name('update');
        Route::delete('/delete', [clientController::class, 'destroy'])->name('destroy');
    });
Route::prefix('admin/user')
    ->middleware('auth:web')
    ->name('admin.user.')
    ->group(function () {

        Route::get('/index', [userController::class, 'index'])->name('index');
        Route::get('/add', [userController::class, 'add'])->name('add');
        Route::put('/create', [userController::class, 'create'])->name('create');
        Route::patch('/update', [userController::class, 'update'])->name('update');
        Route::delete('/delete', [userController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('admin/subscribtion')
    ->middleware('auth:web')
    ->name('admin.subscribtion.')
    ->group(function () {

        Route::get('/index', [subscribtionController::class, 'index'])->name('index');
        Route::put('/create', [subscribtionController::class, 'create'])->name('create');
        Route::get('/add', [subscribtionController::class, 'add'])->name('add');
    });
    Route::prefix('admin/payment')
    ->middleware('auth:web')
    ->name('admin.payment.')
    ->group(function () {

        Route::get('/index', [paymentController::class, 'index'])->name('index');
        Route::put('/create', [paymentController::class, 'create'])->name('create');
        Route::get('/add', [paymentController::class, 'add'])->name('add');
    });









    
    
    require __DIR__.'/auth.php';
    require __DIR__.'/client.php';
    require __DIR__.'/authclient.php';

    
