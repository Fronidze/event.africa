<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\FestivalGalleryController;
use App\Http\Controllers\MovieGalleryController;
use App\Http\Controllers\MusicGalleryController;
use App\Http\Controllers\NewsGalleryController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\PhotoGalleryController;
use App\Http\Controllers\PoetryGalleryController;
use App\Http\Controllers\TeamController;
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

Route::prefix('admin')->name('panel.')->group(function () {
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

        Route::get('movie', [MovieGalleryController::class, 'list'])->name('movie');
        Route::get('movie/form', [MovieGalleryController::class, 'movieForm'])->name('movie.form');
        Route::post('movie/form', [MovieGalleryController::class, 'movieCreate'])->name('movie.create');
        Route::get('movie/{id}/remove', [MovieGalleryController::class, 'movieRemove'])->name('movie.remove');
        Route::get('movie/{id}/view', [MovieGalleryController::class, 'movieView'])->name('movie.view');
        Route::post('movie/{id}/edit', [MovieGalleryController::class, 'movieEdit'])->name('movie.edit');

        Route::get('music', [MusicGalleryController::class, 'music'])->name('music');
        Route::get('music/form', [MusicGalleryController::class, 'musicForm'])->name('music.form');
        Route::post('music/form', [MusicGalleryController::class, 'musicCreate'])->name('music.create');
        Route::get('music/{id}/remove', [MusicGalleryController::class, 'musicRemove'])->name('music.remove');
        Route::get('music/{id}/view', [MusicGalleryController::class, 'musicView'])->name('music.view');
        Route::post('music/{id}/edit', [MusicGalleryController::class, 'musicEdit'])->name('music.edit');

        Route::get('poetry', [PoetryGalleryController::class, 'poetry'])->name('poetry');
        Route::get('poetry/form', [PoetryGalleryController::class, 'poetryForm'])->name('poetry.form');
        Route::post('poetry/form', [PoetryGalleryController::class, 'poetryCreate'])->name('poetry.create');
        Route::get('poetry/{id}/remove', [PoetryGalleryController::class, 'poetryRemove'])->name('poetry.remove');
        Route::get('poetry/{id}/view', [PoetryGalleryController::class, 'poetryView'])->name('poetry.view');
        Route::post('poetry/{id}/edit', [PoetryGalleryController::class, 'poetryEdit'])->name('poetry.edit');

        Route::get('photo', [PhotoGalleryController::class, 'photo'])->name('photo');
        Route::get('photo/form', [PhotoGalleryController::class, 'photoForm'])->name('photo.form');
        Route::post('photo/form', [PhotoGalleryController::class, 'photoCreate'])->name('photo.create');
        Route::get('photo/{id}/remove', [PhotoGalleryController::class, 'photoRemove'])->name('photo.remove');
        Route::get('photo/{id}/view', [PhotoGalleryController::class, 'photoView'])->name('photo.view');
        Route::post('photo/{id}/edit', [PhotoGalleryController::class, 'photoEdit'])->name('photo.edit');

        Route::get('team', [TeamController::class, 'team'])->name('team');
        Route::get('team/form', [TeamController::class, 'teamForm'])->name('team.form');
        Route::post('team/form', [TeamController::class, 'teamCreate'])->name('team.create');
        Route::get('team/{id}/remove', [TeamController::class, 'teamRemove'])->name('team.remove');
        Route::get('team/{id}/view', [TeamController::class, 'teamView'])->name('team.view');
        Route::post('team/{id}/edit', [TeamController::class, 'teamEdit'])->name('team.edit');

    });
});

Route::prefix('{lang?}')->group(function () {
    $lang = request()->segment(1);
    if ($lang !== null) {
        App::setLocale($lang);
    }

    Route::get('/', [Controller::class, 'main']);
});
