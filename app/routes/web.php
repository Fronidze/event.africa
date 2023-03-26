<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\FestivalGalleryController;
use App\Http\Controllers\NewsGalleryController;
use App\Http\Controllers\PanelController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [Controller::class, 'main']);

Route::prefix('panel')->name('panel.')->group(function () {
    Route::get('/', [PanelController::class, 'index'])->name('index');

    Route::prefix('gallery')->name('gallery.')->group(function () {

        Route::get('festival', [FestivalGalleryController::class, 'festival'])->name('festival');
        Route::get('festival/form', [FestivalGalleryController::class, 'festivalForm'])->name('festival.form');
        Route::post('festival/form', [FestivalGalleryController::class, 'festivalCreate'])->name('festival.create');
        Route::get('festival/{id}/remove', [FestivalGalleryController::class, 'festivalRemove'])->name('festival.remove');
        Route::get('festival/{id}/view', [FestivalGalleryController::class, 'festivalView'])->name('festival.view');
        Route::post('festival/{id}/edit', [FestivalGalleryController::class, 'festivalEdit'])->name('festival.edit');

        Route::get('news', [NewsGalleryController::class, 'news'])->name('news');
        Route::get('news/form', [NewsGalleryController::class, 'newsForm'])->name('news.form');
        Route::post('news/form', [NewsGalleryController::class, 'newsCreate'])->name('news.create');
        Route::get('news/{id}/remove', [NewsGalleryController::class, 'newsRemove'])->name('news.remove');
        Route::get('news/{id}/view', [NewsGalleryController::class, 'newsView'])->name('news.view');
        Route::post('news/{id}/edit', [NewsGalleryController::class, 'newsEdit'])->name('news.edit');

    });

});
