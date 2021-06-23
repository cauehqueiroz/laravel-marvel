<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CharacterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/v1/public')->group(function () {
    Route::get('/characters', [CharacterController::class, 'all']);
    Route::post('/character', [CharacterController::class, 'store']);
    Route::get('/character/{characterId}', [CharacterController::class, 'getSingle']);
    Route::put('/character/{characterId}', [CharacterController::class, 'update']);
    Route::get('/character/{characterId}/comics', [CharacterController::class, 'getComics']);
    // Route::get('/character/{characterId}/events', [CharacterController::class,'getEvents']);
    // Route::get('/character/{characterId}/series', [CharacterController::class,'getSeries']);
    // Route::get('/character/{characterId}/stories', [CharacterController::class,'getStories']);
});
