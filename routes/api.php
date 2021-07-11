<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('article-json', [App\Http\Controllers\Api\ArticleController::class, 'show']);

Route::put('article-increment-views', [App\Http\Controllers\Api\ArticleController::class, 'incrementViews']);
Route::put('article-increment-likes', [App\Http\Controllers\Api\ArticleController::class, 'incrementLikes']);
