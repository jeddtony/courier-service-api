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
//
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('/sender/create', 'SenderController@create');

Route::post('/sender/create', 'SenderController@store');

Route::get('/senders', 'SenderController@index');

Route::get('/senders/{sender}', 'SenderController@show');

Route::get('/recipients', 'RecipientController@index');

Route::get('/recipients/{recipient}', 'RecipientController@show');

Route::get('/tokens', 'TokenController@index');

Route::get('/tokens/{token}', 'TokenController@show');

Route::get('/deliveries', 'DeliveryController@index');

Route::get('/deliveries/{delivery}', 'DeliveryController@show');


Route::get('/token/create', 'TokenController@create');

Route::post('/recipient/create', 'RecipientController@store');

Route::get('/edit/token/{token}', 'TokenController@edit');

Route::patch('/edit/token/{token}', 'TokenController@update');

Route::get('/edit/delivery/{delivery}', 'DeliveryController@edit');

Route::patch('/edit/delivery/{delivery}', 'DeliveryController@update');

Route::post('/delivery', 'DeliveryController@store');

Route::post('/token', 'TokenController@store');