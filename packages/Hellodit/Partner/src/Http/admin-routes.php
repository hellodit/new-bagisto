<?php


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
