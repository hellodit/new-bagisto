<?php

Route::group([
        'prefix'     => 'partner',
        'middleware' => ['web', 'theme', 'locale', 'currency']
    ], function () {

        Route::get('', 'Webkul\Partner\Http\Controllers\Shop\PartnerController@index')->defaults('_config', [
            'view' => 'partner::shop.index',
        ])->name('shop.partners.index');


    Route::get('/{id}', 'Webkul\Partner\Http\Controllers\Shop\PartnerController@detail')->defaults('_config', [
        'view' => 'partner::shop.detail',
    ])->name('shop.partner.detail');


});
