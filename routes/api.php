<?php

use App\Http\Controllers\BooksController;
use App\Http\Controllers\FavoritesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('books/{search}', [BooksController::class, 'search']);
Route::group(['prefix' => 'favorites'], function () {
    Route::get('/', [FavoritesController::class, 'get']);
    Route::post('/', [FavoritesController::class, 'create']);
    Route::delete('/{favorite}', [FavoritesController::class, 'delete']);
});
