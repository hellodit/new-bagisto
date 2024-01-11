<?php


use Hellodit\Partner\Http\Controllers\Admin\PartnerAddressController;
use Hellodit\Partner\Http\Controllers\Admin\PartnerController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'admin/partner',
    'middleware' => ['web', 'admin']
], function () {

    Route::get('', [PartnerController::class, 'index'])
        ->name('admin.partner.index');

    Route::get('create', [PartnerController::class, 'create'])
        ->name('admin.partner.create');

    Route::post('partner', [PartnerController::class, 'store'])
        ->name('admin.partner.store');

    Route::get('{partner}', [PartnerController::class, 'show'])
        ->name('admin.partner.show');

    Route::get('{partner}/edit', [PartnerController::class, 'edit'])
        ->name('admin.partner.edit');

    Route::put('{partner}', [PartnerController::class, 'update'])
        ->name('admin.partner.update');

    Route::delete('{partner}', [PartnerController::class, 'destroy'])
        ->name('admin.partner.destroy');


});


Route::group([
    'prefix' => 'admin/partner-address',
    'middleware' => ['web', 'admin']
], function () {
    Route::get('', [PartnerAddressController::class, 'index'])
        ->name('admin.partner_address.index');

    Route::get('create', [PartnerAddressController::class, 'create'])
        ->name('admin.partner_address.create');

    Route::post('partner', [PartnerAddressController::class, 'store'])
        ->name('admin.partner_address.store');

    Route::get('{partner}', [PartnerAddressController::class, 'show'])
        ->name('admin.partner_address.show');

    Route::get('{partner}/edit', [PartnerAddressController::class, 'edit'])
        ->name('admin.partner_address.edit');

    Route::put('{partner}', [PartnerAddressController::class, 'update'])
        ->name('admin.partner_address.update');

    Route::delete('{partner}', [PartnerAddressController::class, 'destroy'])
        ->name('admin.partner_address.destroy');


});
