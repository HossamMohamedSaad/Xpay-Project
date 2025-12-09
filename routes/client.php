<?php


    Route::prefix('client/wallet')
    ->name('client.wallet.')
    ->group(function () {
        Route::get('/index', function () { return view('client.pages.wallet.index'); })->name('index');    
    });
    Route::prefix('client/bid')
    ->name('client.bid.')
    ->group(function () {
        Route::get('/index', function () { return view('client.pages.bid.index'); })->name('index');    
    });
    Route::prefix('client/collection')
    ->name('client.collection.')
    ->group(function () {
        Route::get('/index', function () { return view('client.pages.collection.index'); })->name('index');    
    });
    Route::prefix('client/create')
    ->name('client.create.')
    ->group(function () {
        Route::get('/index', function () { return view('client.pages.create.index'); })->name('index');    
    });
    Route::prefix('client/explore')
    ->name('client.explore.')
    ->group(function () {
        Route::get('/index', function () { return view('client.pages.explore.index'); })->name('index');    
    });
    Route::prefix('client/favorite')
    ->name('client.favorite.')
    ->group(function () {
        Route::get('/index', function () { return view('client.pages.favorite.index'); })->name('index');    
    });
    Route::prefix('client/history')
    ->name('client.history.')
    ->group(function () {
        Route::get('/index', function () { return view('client.pages.history.index'); })->name('index');    
    });
    Route::prefix('client/setting')
    ->name('client.setting.')
    ->group(function () {
        Route::get('/index', function () { return view('client.pages.setting.index'); })->name('index');    
    });
    Route::prefix('client/market')
    ->name('client.market.')
    ->group(function () {
        Route::get('/index', function () { return view('client.pages.market.index'); })->name('index');    
    });
    
    Route::get('/aa', function () {
        return view('client.ppp.market');
    });
    
    Route::prefix('client/account')
    ->name('client.account.')
    ->middleware('auth:client')
    ->group( function () {

        Route::get('/index', [\App\Http\Controllers\client\AccountController::class, 'index'])->name('index');
        Route::post('/create', [\App\Http\Controllers\client\AccountController::class, 'create'])->name('create');
        Route::get('/add', [\App\Http\Controllers\client\AccountController::class, 'add'])->name('add');
    });
    










