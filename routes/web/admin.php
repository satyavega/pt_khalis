<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PrintOrderController;
use App\Http\Controllers\Admin\AgreementController;
use App\Http\Controllers\Admin\HandoverController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\BapController;
use App\Http\Controllers\Admin\BastController;
use App\Http\Controllers\Admin\PaymentRequestController;


// Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('index');
Route::post('/update-order-status', [OrderController::class, 'updateStatus'])->name('updateOrderStatus');

// Surat Pesanan (Orders)
Route::group([
    'prefix' => 'orders',
    'as' => 'orders.',
], function () {
    Route::get('/create', [OrderController::class, 'create'])->name('create');
    Route::get('/', [OrderController::class, 'index'])->name('index');
    Route::post('/', [OrderController::class, 'store'])->name('store');
    Route::get('/{order}', [OrderController::class, 'show'])->name('show');
    Route::put('/{order}', [OrderController::class, 'update'])->name('update');
    Route::delete('/{order}', [OrderController::class, 'destroy'])->name('destroy');

    Route::get('/print/{order}', [PrintOrderController::class, 'index'])->name('print.index');
    Route::get('/pdf', [OrderController::class, 'pdf'])->name('pdf');
    Route::get('/orders/pdf', [OrderController::class, 'pdf'])->name('orders.pdf');

});

// // Kesepakatan Harga (Agreements)
Route::group([
    'prefix' => 'admin/agreements',
    'as' => 'admin.agreements.',
], function () {
    Route::get('/', [AgreementController::class, 'index'])->name('index');
    Route::get('/create', [AgreementController::class, 'create'])->name('create');
    Route::get('/pdf', [AgreementController::class, 'pdf'])->name('pdf');
});

// // Penyerahan Pekerjaan (Handovers)
// Route::group([
//     'prefix' => 'admin/handovers',
//     'as' => 'admin.handovers.',
// ], function () {
//     Route::get('/', [HandoverController::class, 'index'])->name('index');
// });

// // Faktur Penjualan (Invoices)
// Route::group([
//     'prefix' => 'admin/invoices',
//     'as' => 'admin.invoices.',
// ], function () {
//     Route::get('/', [InvoiceController::class, 'index'])->name('index');
//     Route::get('/create', [InvoiceController::class, 'create'])->name('create');
//     Route::get('/pdf', [InvoiceController::class, 'pdf'])->name('pdf');
// });

// // BAP
// Route::group([
//     'prefix' => 'admin/bap',
//     'as' => 'admin.bap.',
// ], function () {
//     Route::get('/', [BapController::class, 'index'])->name('index');
//     Route::get('/create', [BapController::class, 'create'])->name('create');
//     Route::get('/pdf', [BapController::class, 'pdf'])->name('pdf');
// });

// // BAST
// Route::group([
//     'prefix' => 'admin/bast',
//     'as' => 'admin.bast.',
// ], function () {
//     Route::get('/', [BastController::class, 'index'])->name('index');
//     Route::get('/create', [BastController::class, 'create'])->name('create');
//     Route::get('/pdf', [BastController::class, 'pdf'])->name('pdf');
// });

// // Permohonan Bayar (Payment Requests)
// Route::group([
//     'prefix' => 'admin/payment-requests',
//     'as' => 'admin.payment-requests.',
// ], function () {
//     Route::get('/', [PaymentRequestController::class, 'index'])->name('index');
//     Route::get('/create', [PaymentRequestController::class, 'create'])->name('create');
//     Route::get('/pdf', [PaymentRequestController::class, 'pdf'])->name('pdf');
// });
