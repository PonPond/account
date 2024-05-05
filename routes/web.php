<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DebtorController;
use App\Http\Controllers\DebtorMController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SummarysController;
use App\Http\Controllers\RemarkController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
    Route::get('/dashboard', [DebtorController::class, 'dashboard'])->name('dashboard');


    Route::get('/debtor', [DebtorController::class, 'index'])->name('debtor.index');
    // Route::get('/debtor', [DebtorController::class, 'index'])->name('debtor.index');
    Route::post('/debtors/store', [DebtorController::class, 'store'])->name('debtors.store');
    Route::post('/debtors/update/{id}', [DebtorController::class, 'update'])->name('debtors.update');
    Route::post('/debtors/storeg', [DebtorController::class, 'storeg'])->name('deb.storeg');
    Route::get('/debtors/storeg/{id}', [DebtorController::class, 'delete']);
    Route::get('/debtors/delete/{id}', [DebtorController::class, 'deleteb']);


    Route::get('/debtor-d', [DebtorMController::class, 'indexD'])->name('debtord.index');
    Route::get('/debtor-m', [DebtorMController::class, 'index'])->name('debtorm.index');
    Route::get('/debtor-y', [DebtorMController::class, 'indexY'])->name('debtory.index');
    Route::get('/debtors-m/{id}', [DebtorMController::class, 'read']);
    Route::get('/debtors-m/round/{id}', [DebtorMController::class, 'readdeb']);
    Route::get('/debtors-m/delete/{id}', [DebtorMController::class, 'delete']);
    Route::get('/debtors-m/update/{id}', [DebtorMController::class, 'update']);
    Route::post('/debtors-m/update/money/{id}', [DebtorMController::class, 'updatemoney']);
    Route::post('/debtors-m/update/final/{id}', [DebtorMController::class, 'updatefinal']);
    
    Route::get('/check-zero-values', [DebtorMController::class, 'notify']);


  


    Route::post('/debtors-m/store/round', [OrderController::class, 'storeround'])->name('debtorsM.storeround');
    Route::post('/debtors-m/store/update/{id}', [OrderController::class, 'update']);


    Route::post('/debtors-m/store', [OrderController::class, 'store'])->name('debtorsM.store');

    Route::post('/payment/store', [PaymentController::class, 'store'])->name('payment.store');
    Route::post('/payment/dd/store', [PaymentController::class, 'storedd'])->name('dd_payment.store');

    Route::post('/summary/store', [SummarysController::class, 'store'])->name('summary.store');



    Route::post('/remark/store', [RemarkController::class, 'store'])->name('remark.store');
    Route::get('/remark/delete/{id}', [RemarkController::class, 'delete'])->name('remark.delete');

});
