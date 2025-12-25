<?php

use App\Http\Controllers\client\AccountController;
use App\Http\Controllers\client\ExpenseCategoryController;
use App\Http\Controllers\client\ExpensesController;
use App\Http\Controllers\client\IncomeController;
use App\Http\Controllers\client\IncomeSourceController;
use App\Http\Controllers\client\MonthlyExpenseCategoryController;
use App\Http\Controllers\client\MonthlyIncomeSourceController;
use App\Http\Controllers\client\PaymobController;
use App\Http\Controllers\client\PlansController;
use App\Http\Controllers\client\TransactionController;
use App\Http\Controllers\client\ReportController;
use App\Http\Controllers\client\SubscribtionController;
use Illuminate\Support\Facades\Route;

Route::prefix('client/wallet')
    ->name('client.wallet.')
    ->group(function () {
        Route::get('/index', function () {
            return view('client.pages.wallet.index');
        })->name('index');
    });
// Route::prefix('client/bid')
// ->name('client.bid.')
// ->group(function () {
//     Route::get('/index', function () { return view('client.pages.bid.index'); })->name('index');
// });
Route::prefix('client/collection')
    ->name('client.collection.')
    ->group(function () {
        Route::get('/index', function () {
            return view('client.pages.collection.index');
        })->name('index');
    });
Route::prefix('client/create')
    ->name('client.create.')
    ->group(function () {
        Route::get('/index', function () {
            return view('client.pages.create.index');
        })->name('index');
    });
    Route::prefix('client/favorite')
    ->name('client.favorite.')
    ->group(function () {
        Route::get('/index', function () {
            return view('client.pages.favorite.index');
        })->name('index');
    });
Route::prefix('client/history')
    ->name('client.history.')
    ->group(function () {
        Route::get('/index', function () {
            return view('client.pages.history.index');
        })->name('index');
    });
Route::prefix('client/setting')
    ->name('client.setting.')
    ->group(function () {
        Route::get('/index', function () {
            return view('client.pages.setting.index');
        })->name('index');
    });
Route::prefix('client/market')
    ->name('client.market.')
    ->group(function () {
        Route::get('/index', function () {
            return view('client.pages.market.index');
        })->name('index');
    });

Route::get('/aa', function () {
    return view('client.ppp.market');
});

Route::prefix('client/dashboard')
    ->name('client.dashboard.')
    ->middleware('auth:client')
    ->group(function () {

        Route::get('/index', [\App\Http\Controllers\client\DashboardController::class, 'index'])->name('index');
        
    });
Route::prefix('client/account')
    ->name('client.account.')
    ->middleware('auth:client')
    ->group(function () {

        Route::get('/index', [AccountController::class, 'index'])->name('index');
        Route::get('/add', [AccountController::class, 'add'])->name('add');
        Route::post('/create', [AccountController::class, 'create'])->name('create');
        Route::post('/destroy', [AccountController::class, 'destroy'])->name('delete');
        Route::post('/edit', [AccountController::class, 'edit'])->name('edit');
        Route::post('/update', [AccountController::class, 'update'])->name('update');
    });

Route::prefix('client/transaction')
    ->name('client.transaction.')
    ->middleware('auth:client')
    ->group(function () {

        Route::get('/index', [TransactionController::class, 'index'])->name('index');
        Route::get('/add', [TransactionController::class, 'add'])->name('add');
        Route::post('/create', [TransactionController::class, 'create'])->name('create');
    });
Route::prefix('client/income_source')
    ->name('client.income_source.')
    ->middleware('auth:client')
    ->group(function () {

        Route::get('/index', [IncomeSourceController::class, 'index'])->name('index');
        Route::get('/add', [IncomeSourceController::class, 'add'])->name('add');
        Route::post('/create', [IncomeSourceController::class, 'create'])->name('create');
        Route::get('/destroy/{id}', [IncomeSourceController::class, 'destroy'])->name('delete');
        Route::get('/edit/{id}', [IncomeSourceController::class, 'edit'])->name('edit');
        Route::post('/update', [IncomeSourceController::class, 'update'])->name('update');
    });
Route::prefix('client/expense_category')
    ->name('client.expense_category.')
    ->middleware('auth:client')
    ->group(function () {

        Route::get('/index', [ExpenseCategoryController::class, 'index'])->name('index');
        Route::get('/add', [ExpenseCategoryController::class, 'add'])->name('add');
        Route::post('/create', [ExpenseCategoryController::class, 'create'])->name('create');
        Route::get('/destroy/{id}', [ExpenseCategoryController::class, 'destroy'])->name('delete');
        Route::get('/edit/{id}', [ExpenseCategoryController::class, 'edit'])->name('edit');
        Route::post('/update', [ExpenseCategoryController::class, 'update'])->name('update');
    });
Route::prefix('client/month_income')
    ->name('client.month_income.')
    ->middleware('auth:client')
    ->group(function () {

        Route::get('/index', [MonthlyIncomeSourceController::class, 'index'])->name('index');
        Route::get('/add', [MonthlyIncomeSourceController::class, 'add'])->name('add');
        Route::post('/create', [MonthlyIncomeSourceController::class, 'create'])->name('create');
        Route::get('/destroy/{id}', [MonthlyIncomeSourceController::class, 'destroy'])->name('delete');
        Route::get('/edit/{id}', [MonthlyIncomeSourceController::class, 'edit'])->name('edit');
        Route::post('/update', [MonthlyIncomeSourceController::class, 'update'])->name('update');
        Route::post('/confirmGet', [MonthlyIncomeSourceController::class, 'confirmGet'])->name('confirmGet');
        Route::get('/pay/{id}', [MonthlyIncomeSourceController::class, 'pay'])->name('pay');


    });
Route::prefix('client/month_expense')
    ->name('client.month_expense.')
    ->middleware('auth:client')
    ->group(function () {

        Route::get('/index', [MonthlyExpenseCategoryController::class, 'index'])->name('index');
        Route::get('/add', [MonthlyExpenseCategoryController::class, 'add'])->name('add');
        Route::post('/create', [MonthlyExpenseCategoryController::class, 'create'])->name('create');
        Route::get('/destroy/{id}', [MonthlyExpenseCategoryController::class, 'destroy'])->name('delete');
        Route::get('/edit/{id}', [MonthlyExpenseCategoryController::class, 'edit'])->name('edit');
        Route::get('/pay/{id}', [MonthlyExpenseCategoryController::class, 'pay'])->name('pay');
        Route::post('/update', [MonthlyExpenseCategoryController::class, 'update'])->name('update');
        Route::post('/confirmPay', [MonthlyExpenseCategoryController::class, 'confirmPay'])->name('confirmPay');
    });
Route::prefix('client/income')
    ->name('client.income.')
    ->middleware('auth:client')
    ->group(function () {

        Route::get('/index', [IncomeController::class, 'index'])->name('index');
        Route::get('/add', [IncomeController::class, 'add'])->name('add');
        Route::post('/create', [IncomeController::class, 'create'])->name('create');
        Route::get('/destroy/{id}', [IncomeController::class, 'destroy'])->name('delete');
        Route::get('/edit/{id}', [IncomeController::class, 'edit'])->name('edit');
        Route::post('/update', [IncomeController::class, 'update'])->name('update');
    });
Route::prefix('client/expense')
    ->name('client.expense.')
    ->middleware('auth:client')
    ->group(function () {

        Route::get('/index', [ExpensesController::class, 'index'])->name('index');
        Route::get('/add', [ExpensesController::class, 'add'])->name('add');
        Route::post('/create', [ExpensesController::class, 'create'])->name('create');
        Route::get('/destroy/{id}', [ExpensesController::class, 'destroy'])->name('delete');
        Route::get('/edit/{id}', [ExpensesController::class, 'edit'])->name('edit');
        Route::post('/update', [ExpensesController::class, 'update'])->name('update');
    });
    
    Route::prefix('client/report')
        ->name('client.report.')
        ->group(function () {
            Route::get('/index',[ReportController::class, 'index'])->name('index'); 
            // Route::get('/export', [ReportController::class, 'export'])->name('export');
            Route::get('/export/income',  [ReportController::class, 'exportIncome'])->name('export.income');
            Route::get('/export/expense', [ReportController::class, 'exportExpense'])->name('export.expense');

        });
    
        Route::prefix('client/plan')
            ->name('client.plan.')
            ->group(function () {
                Route::get('/index',[PlansController::class, 'index'])->name('index'); 
            });
        Route::prefix('client/subscription')
            ->name('client.subscription.')
            ->group(function () {
                Route::get('/index',[SubscribtionController::class, 'index'])->name('index'); 
                Route::get('/cancel/{id}',action: [SubscribtionController::class, 'cancel'])->name('cancel'); 
            });
    












Route::middleware(['auth:client'])->prefix('client')->name('client.')->group(function () {
    // زر Subscribe في صفحة الخطط
    Route::post('/plans/{plan}/pay', [PaymobController::class, 'pay'])->name('plans.pay');

    // (اختياري) صفحة تعرض نتيجة الدفع
    Route::get('/payment/result', [PaymobController::class, 'result'])->name('payment.result');
});

// لازم دول يبقوا Public (بدون auth) عشان Paymob يقدر يضربهم
Route::get('/paymob/return', [PaymobController::class, 'paymobReturn'])->name('paymob.return');
Route::post('/paymob/processed', [PaymobController::class, 'processedCallback'])->name('paymob.processed');
// Route::get('/paymob/processed', function () { return redirect('/client/plan/index');});


