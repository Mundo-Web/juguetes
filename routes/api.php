<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SaleDetailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/payment/culqi', [PaymentController::class, 'culqi'])->name('payment.culqi');

Route::middleware(['web', 'auth:sanctum', 'verified'])->group(function () {
    Route::post('/address', [AddressController::class, 'save'])->name('address.save');
    Route::delete('/address/{id}', [AddressController::class, 'delete'])->name('address.delete');

    Route::post('/sales/paginate', [SaleController::class, 'paginate'])->name('sales.paginate');
    Route::post('/sales/confirmation', [SaleController::class, 'confirmation'])->name('sales.confirmation');
    Route::patch('/sales/status', [SaleController::class, 'status'])->name('sales.status');
    Route::get('/saledetails/{sale}', [SaleDetailController::class, 'bySale'])->name('sale.bySale');
});