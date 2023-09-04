<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/get_top_songs', [\App\Http\Controllers\Song\IndexController::class, '__invoke']);
Route::get('/get_song_to_show/{id}', [\App\Http\Controllers\Song\IndexController::class, 'showSong']);
Route::get('/get_singer/{id}', [\App\Http\Controllers\Singer\IndexController::class, 'showSinger']);
Route::get('/get_album/{id}', [\App\Http\Controllers\Album\IndexController::class, 'showAlbum']);
Route::get('/get_music_stats', [\App\Http\Controllers\API\MusicStatisticController::class, 'getMusicStats']);
Route::get('/get_songs_to_stats', [\App\Http\Controllers\API\MusicStatisticController::class, 'getSongs']);
//Route::get('/genres', [\App\Http\Controllers\API\MusicStatisticController::class, '']);
