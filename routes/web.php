<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DebtorController;
use App\Http\Controllers\DebtorMController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SummarysController;



Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/debtor', [DebtorController::class, 'index'])->name('debtor.index');
    Route::post('/debtors/store', [DebtorController::class, 'store'])->name('debtors.store');


    Route::get('/debtor-m', [DebtorMController::class, 'index'])->name('debtorm.index');
    Route::get('/debtors-m/{id}', [DebtorMController::class, 'read']);
    Route::get('/debtors-m/round/{id}', [DebtorMController::class, 'readdeb']);

    
    Route::post('/debtors-m/store/round', [OrderController::class, 'storeround'])->name('debtorsM.storeround');
    Route::post('/debtors-m/store', [OrderController::class, 'store'])->name('debtorsM.store');

    Route::post('/payment/store', [PaymentController::class, 'store'])->name('payment.store');

    Route::post('/summary/store', [SummarysController::class, 'store'])->name('summary.store');


});
