<?php

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

Route::get('/', function () {
    return view('index');
});

Route::get('/{pathMatch}', function () {
    return view('index');
})->where('pathMatch', '.*');


Route::group(['namespace' => 'singer', 'prefix' => 'singers'], function () {
    Route::get('/', [\App\Http\Controllers\Singer\IndexController::class, '__invoke'])->name('singer.index');
});

Route::group(['namespace' => 'album', 'prefix' => 'albums'], function () {
    Route::get('/', [\App\Http\Controllers\Album\IndexContoller::class, '__invoke'])->name('album.index');
});

Route::group(['namespace' => 'song', 'prefix' => 'songs'], function () {
    Route::get('/', [\App\Http\Controllers\Song\IndexController::class, '__invoke'])->name('songs.index');
});

