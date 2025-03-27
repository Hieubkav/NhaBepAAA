<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\SectionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Artisan;

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

Route::controller(SectionController::class)->group(function () {
    Route::get('/sections/{id}', 'show')
        ->name('sections.show');
});

Route::get('/run-storage-link', function () {
    try {
        Artisan::call('storage:link');
        return response()->json(['message' => 'Storage linked successfully!'], 200);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
});
