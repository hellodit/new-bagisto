<?php

use Hellodit\CustomerProduct\Http\Controllers\Shop\CustomerProductController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'customer/product',
    'middleware' => ['web', 'theme', 'locale', 'currency']
], function () {

    Route::get('/', [CustomerProductController::class, 'index'])
        ->name('shop.customer_product.index');
    Route::get('edit/{id}', [CustomerProductController::class, 'edit'])->name('shop.customer_product.edit');
    Route::post('edit/{id}', [CustomerProductController::class, 'update'])->name('shop.customer_product.update');
    Route::post('destroy', [CustomerProductController::class, 'destroy'])->name('shop.customer_product.destroy');
    Route::get('create', [CustomerProductController::class, 'create'])->name('shop.customer_product.create');
    Route::post('store', [CustomerProductController::class, 'store'])->name('shop.customer_product.store');
//

});


