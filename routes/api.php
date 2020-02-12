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

Route::post('/faq/create', 'Api\FaqController@store');
Route::get('/faq/{faq}/edit/', 'Api\FaqController@edit');
Route::post('/faq/{faq}/update/', 'Api\FaqController@update');
Route::delete('/faq/{faq}/delete', 'Api\FaqController@destroy');
Route::get('/faqs', 'Api\FaqController@index');
