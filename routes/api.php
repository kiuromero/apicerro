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

Route::get('news','NewsController@getNews');
Route::get('streaming','NewsController@getUrlStreaming');
Route::get('news/{id}','NewsController@getNewsId');
Route::get('adress','NewsController@getAdress');
Route::get('categories','NewsController@getCategories');
Route::get('programs','NewsController@getPrograms');
Route::get('gallery-images','NewsController@getGalleryImages');
Route::get('news-category/{id}','NewsController@getNewsForCategory');

