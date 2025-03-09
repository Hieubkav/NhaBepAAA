<?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\MainController;


    Route::controller(MainController::class)->group(function () {
        Route::get('/', 'storeFront')->name('storeFront');
        Route::get('/catfilter', 'catFilter')->name('catFilter');
        Route::get('/productOverview/{product_id}', 'productOverview')->name('productOverview');
    });
