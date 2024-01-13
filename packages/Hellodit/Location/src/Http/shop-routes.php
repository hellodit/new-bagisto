<?php

use Hellodit\Location\Http\Controllers\Shop\LocationController;

Route::group([
        'prefix'     => 'location',
        'middleware' => ['web', 'theme', 'locale', 'currency']
    ], function () {
//
//        Route::get('/', 'Hellodit\Location\Http\Controllers\Shop\LocationController@index')->defaults('_config', [
//            'view' => 'location::shop.index',
//        ])->name('shop.location.index');
//


    Route::get('detail/{slug}', 'Hellodit\Location\Http\Controllers\Shop\LocationController@detail')->defaults('_config', [
        'view' => 'location::shop.detail',
    ])->name('shop.location.detail');
    Route::get('/list-locations', [LocationController::class,'list_locations'])
        ->name('shop.location.list-locations');

});
