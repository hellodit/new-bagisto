<?php


use Illuminate\Support\Facades\Route;
use Webkul\Partner\Http\Controllers\Admin\PartnerController;

Route::group([
    'prefix' => 'admin/partner',
    'middleware' => ['web', 'admin']
], function () {

    Route::get('', 'Webkul\Partner\Http\Controllers\Admin\PartnerController@index')->defaults('_config', [
        'view' => 'partner::admin.index',
    ])->name('admin.partner.index');

    Route::get('create', [PartnerController::class, 'create'])
        ->defaults('_config', [
            'view' => 'partner::admin.create',
        ])
        ->name('admin.partner.create');

    Route::post('partner', [PartnerController::class, 'store'])

        ->name('admin.partner.store');

    Route::get('{partner}', [PartnerController::class, 'show'])
        ->defaults('_config', [
            'view' => 'partner::admin.index',
        ])
        ->name('admin.partner.show');

    Route::get('{partner}/edit', [PartnerController::class, 'edit'])
        ->defaults('_config', [
            'view' => 'partner::admin.edit',
        ])
        ->name('admin.partner.edit');

    Route::put('{partner}', [PartnerController::class, 'update'])
        ->name('admin.partner.update');

    Route::delete('{partner}', [PartnerController::class, 'destroy'])
        ->name('admin.partner.destroy');


});
