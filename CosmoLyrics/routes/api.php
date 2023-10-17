<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware(['jwt.auth'])->group(function () {
    Route::get('/get_music_stats', [\App\Http\Controllers\API\MusicStatisticController::class, 'getMusicStats']);
    Route::get('/get_songs_to_stats', [\App\Http\Controllers\API\MusicStatisticController::class, 'getSongs']);
});

Route::middleware(['api'])->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/getaccount', [AuthController::class, 'getaccount']);
});

Route::get('/get_top_songs', [\App\Http\Controllers\Song\IndexController::class, '__invoke']);
Route::get('/get_song_to_show/{id}', [\App\Http\Controllers\Song\IndexController::class, 'showSong']);
Route::get('/get_singer/{id}', [\App\Http\Controllers\Singer\IndexController::class, 'showSinger']);
Route::get('/get_album/{id}', [\App\Http\Controllers\Album\IndexController::class, 'showAlbum']);



