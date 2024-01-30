<?php

use Hellodit\CustomerProduct\Http\Controllers\Shop\CustomerOTPController;
use Hellodit\CustomerProduct\Http\Controllers\Shop\CustomerProductController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'customer/product',
    'middleware' => ['web', 'theme', 'locale', 'currency','customer','isVerify']
], function () {

    Route::get('/', [CustomerProductController::class, 'index'])
        ->name('shop.customer_product.index');
    Route::get('edit/{id}', [CustomerProductController::class, 'edit'])->name('shop.customer_product.edit');
    Route::post('edit/{id}', [CustomerProductController::class, 'update'])->name('shop.customer_product.update');
    Route::post('destroy', [CustomerProductController::class, 'destroy'])->name('shop.customer_product.destroy');
    Route::get('create', [CustomerProductController::class, 'create'])->name('shop.customer_product.create');
    Route::post('store', [CustomerProductController::class, 'store'])->name('shop.customer_product.store');
    Route::get('information/{user_id}', [CustomerProductController::class, 'information'])->name('shop.customer_product.information');
    Route::get('all',[CustomerProductController::class,'UserProducts'])->name('shop.customer_product.list');
    Route::get('categories',[CustomerProductController::class,'tree'])->name('shop.customer_product.categories');
//
});




Route::group([
    'prefix' => 'customer/otp-verification',
    'middleware' => ['web', 'theme', 'locale', 'currency','customer']
], function () {
    Route::get('', [CustomerOTPController::class,'index'])->name('shop.otp.index');
    Route::post('/new-request', [CustomerOTPController::class,'sendNewOtp'])->name('shop.otp.request');
    Route::post('/verify', [CustomerOTPController::class,'verify'])->name('shop.otp.verify');
});

