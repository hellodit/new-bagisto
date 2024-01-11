<?php

use Hellodit\Partner\Http\Controllers\Shop\PartnerController;

Route::group([
    'prefix'     => 'partner',
    'middleware' => ['web', 'theme', 'locale', 'currency']
], function () {

    Route::get('', [PartnerController::class,'index'])->defaults('_config', [
        'view' => 'partner::shop.index',
    ])->name('shop.partners.index');


    Route::get('/{id}', [PartnerController::class,'detail'])->defaults('_config', [
        'view' => 'partner::shop.detail',
    ])->name('shop.partner.detail');


});
