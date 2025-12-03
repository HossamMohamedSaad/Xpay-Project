<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('posts.index');
// Route::get('/posts/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('posts.show');
// Route::get('/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('posts.create');
// Route::post('/posts', [App\Http\Controllers\PostController::class, 'store'])->name('posts.store');
// Route::get('/posts/{post}/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('posts.edit');
// Route::put('/posts/{post}', [App\Http\Controllers\PostController::class, 'update'])->name('posts.update');
// Route::delete('/posts/{post}', [App\Http\Controllers\PostController::class, 'destroy'])->name('posts.destroy');


Route::get('/dashboard', function () {
    return view('admin.pages.dashboard.index');
});


Route::prefix('admin/plan')
    ->name('admin.plan.')
    ->group(function () {

        Route::get('/index', [\App\Http\Controllers\admin\PlanController::class, 'index'])->name('index');
        Route::get('/add', [\App\Http\Controllers\admin\PlanController::class, 'add'])->name('add');
        Route::put('/create', [\App\Http\Controllers\admin\PlanController::class, 'create'])->name('create');
        Route::patch('/update', [\App\Http\Controllers\admin\PlanController::class, 'update'])->name('update');
        Route::delete('/delete', [\App\Http\Controllers\admin\PlanController::class, 'destroy'])->name('destroy');
    });
Route::prefix('admin/client')
    ->name('admin.client.')
    ->group(function () {

        Route::get('/index', [\App\Http\Controllers\admin\clientController::class, 'index'])->name('index');
        Route::get('/show', [\App\Http\Controllers\admin\clientController::class, 'show'])->name('show');
        Route::get('/add', [\App\Http\Controllers\admin\clientController::class, 'add'])->name('add');
        Route::put('/create', [\App\Http\Controllers\admin\clientController::class, 'create'])->name('create');
        Route::patch('/update', [\App\Http\Controllers\admin\clientController::class, 'update'])->name('update');
        Route::delete('/delete', [\App\Http\Controllers\admin\clientController::class, 'destroy'])->name('destroy');
    });













require __DIR__.'/auth.php';
