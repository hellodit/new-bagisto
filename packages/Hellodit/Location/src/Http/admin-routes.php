<?php

use Hellodit\Location\Http\Controllers\Admin\LocationController;

Route::group([
        'prefix'        => 'admin/location',
        'middleware'    => ['web', 'admin']
    ], function () {

        Route::get('', 'Hellodit\Location\Http\Controllers\Admin\LocationController@index')->defaults('_config', [
            'view' => 'location::admin.index',
        ])->name('admin.location.index');

    Route::get('create', [LocationController::class, 'create'])
        ->defaults('_config', [
            'view' => 'location::admin.create',
        ])
        ->name('admin.location.create');

    Route::post('location', [LocationController::class, 'store'])

        ->name('admin.location.store');

    Route::get('{location}', [LocationController::class, 'show'])
        ->defaults('_config', [
            'view' => 'location::admin.index',
        ])
        ->name('admin.location.show');

    Route::get('{location}/edit', [LocationController::class, 'edit'])
        ->defaults('_config', [
            'view' => 'location::admin.edit',
        ])
        ->name('admin.location.edit');

    Route::put('{location}', [LocationController::class, 'update'])
        ->name('admin.location.update');

    Route::delete('{location}', [LocationController::class, 'destroy'])
        ->name('admin.location.destroy');


});
