<?php

Route::group([
        'prefix'        => 'admin/customerproduct',
        'middleware'    => ['web', 'admin']
    ], function () {

        Route::get('', 'Hellodit\CustomerProduct\Http\Controllers\Admin\CustomerProductController@index')->defaults('_config', [
            'view' => 'customerproduct::admin.index',
        ])->name('admin.customerproduct.index');

});