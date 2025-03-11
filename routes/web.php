<?php

use App\Http\Controllers\PageController;

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\MainController;


    Route::controller(MainController::class)->group(function () {
        Route::get('/', 'storeFront')->name('storeFront');
        Route::get('/catfilter', 'catFilter')->name('catFilter');
        Route::get('/productOverview/{product_id}', 'productOverview')->name('productOverview');
    });

Route::controller(PageController::class)->group(function () {
    // URL mới
    Route::get('/pages/{id}', 'show')
        ->where('id', '[1-2]')
        ->name('pages.show');

    // Redirect từ URL cũ
    Route::get('/gioi-thieu', function() {
        return redirect()->route('pages.show', 1);
    })->name('about');
    
    Route::get('/lien-he', function() {
        return redirect()->route('pages.show', 2);
    })->name('contact');
});
