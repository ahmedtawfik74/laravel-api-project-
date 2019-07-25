<?php

use Illuminate\Http\Request;

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
//posts Api Routes
Route::get('posts','postsController@index');
Route::get('posts/{id}','postsController@show');
Route::post('posts','postsController@store');
Route::post('posts/{id}','postsController@update');
Route::get('posts/delete/{id}','postsController@delete');


//posts Api Routes
Route::get('categories','CategoryController@index');
Route::get('categories/{id}','CategoryController@show');
Route::post('categories','CategoryController@store');
Route::post('categories/{id}','CategoryController@update');
Route::get('categories/delete/{id}','CategoryController@delete');
