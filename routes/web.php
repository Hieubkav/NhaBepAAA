<?php

use App\Http\Controllers\PageController;

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\MainController;


    Route::controller(MainController::class)->group(function () {
        Route::get('/', 'storeFront')->name('storeFront');
        Route::get('/catfilter/{cat_id?}', 'catFilter')->name('catFilter');
        Route::get('/productOverview/{product_id}', 'productOverview')->name('productOverview');
    });

Route::controller(PageController::class)->group(function () {
    // URL mới
    Route::get('/pages/{id}', 'show')
        ->name('pages.show');
});
