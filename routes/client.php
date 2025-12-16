<?php


    Route::prefix('client/wallet')
    ->name('client.wallet.')
    ->group(function () {
        Route::get('/index', function () { return view('client.pages.wallet.index'); })->name('index');    
    });
    // Route::prefix('client/bid')
    // ->name('client.bid.')
    // ->group(function () {
    //     Route::get('/index', function () { return view('client.pages.bid.index'); })->name('index');    
    // });
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
    
    Route::prefix('client/dashboard')
    ->name('client.dashboard.')
    ->middleware('auth:client')
    ->group( function () {

        Route::get('/index', [\App\Http\Controllers\client\DashboardController::class, 'index'])->name('index');
        // Route::get('/add', [\App\Http\Controllers\client\AccountController::class, 'add'])->name('add');
        // Route::post('/create', [\App\Http\Controllers\client\AccountController::class, 'create'])->name('create');
        // Route::post('/destroy', [\App\Http\Controllers\client\AccountController::class, 'destroy'])->name('delete');
        // Route::post('/edit', [\App\Http\Controllers\client\AccountController::class, 'edit'])->name('edit');
        // Route::post('/update', [\App\Http\Controllers\client\AccountController::class, 'update'])->name('update');
    });
    Route::prefix('client/account')
    ->name('client.account.')
    ->middleware('auth:client')
    ->group( function () {

        Route::get('/index', [\App\Http\Controllers\client\AccountController::class, 'index'])->name('index');
        Route::get('/add', [\App\Http\Controllers\client\AccountController::class, 'add'])->name('add');
        Route::post('/create', [\App\Http\Controllers\client\AccountController::class, 'create'])->name('create');
        Route::post('/destroy', [\App\Http\Controllers\client\AccountController::class, 'destroy'])->name('delete');
        Route::post('/edit', [\App\Http\Controllers\client\AccountController::class, 'edit'])->name('edit');
        Route::post('/update', [\App\Http\Controllers\client\AccountController::class, 'update'])->name('update');
    });

    Route::prefix('client/transaction')
    ->name('client.transaction.')
    ->middleware('auth:client')
    ->group( function () {

        Route::get('/index', [\App\Http\Controllers\client\TransactionController::class, 'index'])->name('index');
        Route::get('/add', [\App\Http\Controllers\client\TransactionController::class, 'add'])->name('add');
        Route::post('/create', [\App\Http\Controllers\client\TransactionController::class, 'create'])->name('create');
    });
    Route::prefix('client/income_source')
    ->name('client.income_source.')
    ->middleware('auth:client')
    ->group( function () {

        Route::get('/index', [\App\Http\Controllers\client\IncomeSourceController::class, 'index'])->name('index');
        Route::get('/add', [\App\Http\Controllers\client\IncomeSourceController::class, 'add'])->name('add');
        Route::post('/create', [\App\Http\Controllers\client\IncomeSourceController::class, 'create'])->name('create');
        Route::get('/destroy/{id}', [\App\Http\Controllers\client\IncomeSourceController::class, 'destroy'])->name('delete');
        Route::get('/edit/{id}', [\App\Http\Controllers\client\IncomeSourceController::class, 'edit'])->name('edit');
        Route::post('/update', [\App\Http\Controllers\client\IncomeSourceController::class, 'update'])->name('update');
    });
    Route::prefix('client/expense_category')
    ->name('client.expense_category.')
    ->middleware('auth:client')
    ->group( function () {

        Route::get('/index', [\App\Http\Controllers\client\ExpenseCategoryController::class, 'index'])->name('index');
        Route::get('/add', [\App\Http\Controllers\client\ExpenseCategoryController::class, 'add'])->name('add');
        Route::post('/create', [\App\Http\Controllers\client\ExpenseCategoryController::class, 'create'])->name('create');
        Route::get('/destroy/{id}', [\App\Http\Controllers\client\ExpenseCategoryController::class, 'destroy'])->name('delete');
        Route::get('/edit/{id}', [\App\Http\Controllers\client\ExpenseCategoryController::class, 'edit'])->name('edit');
        Route::post('/update', [\App\Http\Controllers\client\ExpenseCategoryController::class, 'update'])->name('update');
    });
    Route::prefix('client/month_income')
    ->name('client.month_income.')
    ->middleware('auth:client')
    ->group( function () {

        Route::get('/index', [\App\Http\Controllers\client\MonthlyIncomeSourceController::class, 'index'])->name('index');
        Route::get('/add', [\App\Http\Controllers\client\MonthlyIncomeSourceController::class, 'add'])->name('add');
        Route::post('/create', [\App\Http\Controllers\client\MonthlyIncomeSourceController::class, 'create'])->name('create');
        Route::get('/destroy/{id}', [\App\Http\Controllers\client\MonthlyIncomeSourceController::class, 'destroy'])->name('delete');
        Route::get('/edit/{id}', [\App\Http\Controllers\client\MonthlyIncomeSourceController::class, 'edit'])->name('edit');
        Route::post('/update', [\App\Http\Controllers\client\MonthlyIncomeSourceController::class, 'update'])->name('update');
    });
    Route::prefix('client/month_expense')
    ->name('client.month_expense.')
    ->middleware('auth:client')
    ->group( function () {

        Route::get('/index', [\App\Http\Controllers\client\MonthlyExpenseCategoryController::class, 'index'])->name('index');
        Route::get('/add', [\App\Http\Controllers\client\MonthlyExpenseCategoryController::class, 'add'])->name('add');
        Route::post('/create', [\App\Http\Controllers\client\MonthlyExpenseCategoryController::class, 'create'])->name('create');
        Route::get('/destroy/{id}', [\App\Http\Controllers\client\MonthlyExpenseCategoryController::class, 'destroy'])->name('delete');
        Route::get('/edit/{id}', [\App\Http\Controllers\client\MonthlyExpenseCategoryController::class, 'edit'])->name('edit');
        Route::post('/update', [\App\Http\Controllers\client\MonthlyExpenseCategoryController::class, 'update'])->name('update');
    });
    Route::prefix('client/income')
    ->name('client.income.')
    ->middleware('auth:client')
    ->group( function () {

        Route::get('/index', [\App\Http\Controllers\client\IncomeController::class, 'index'])->name('index');
        Route::get('/add', [\App\Http\Controllers\client\IncomeController::class, 'add'])->name('add');
        Route::post('/create', [\App\Http\Controllers\client\IncomeController::class, 'create'])->name('create');
        Route::get('/destroy/{id}', [\App\Http\Controllers\client\IncomeController::class, 'destroy'])->name('delete');
        Route::get('/edit/{id}', [\App\Http\Controllers\client\IncomeController::class, 'edit'])->name('edit');
        Route::post('/update', [\App\Http\Controllers\client\IncomeController::class, 'update'])->name('update');
    });
    Route::prefix('client/expense')
    ->name('client.expense.')
    ->middleware('auth:client')
    ->group( function () {

        Route::get('/index', [\App\Http\Controllers\client\ExpensesController::class, 'index'])->name('index');
        Route::get('/add', [\App\Http\Controllers\client\ExpensesController::class, 'add'])->name('add');
        Route::post('/create', [\App\Http\Controllers\client\ExpensesController::class, 'create'])->name('create');
        Route::get('/destroy/{id}', [\App\Http\Controllers\client\ExpensesController::class, 'destroy'])->name('delete');
        Route::get('/edit/{id}', [\App\Http\Controllers\client\ExpensesController::class, 'edit'])->name('edit');
        Route::post('/update', [\App\Http\Controllers\client\ExpensesController::class, 'update'])->name('update');
    });
    










