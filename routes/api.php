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

Route::get('/currencies', 'Api\CurrencyController@index');
Route::get('/currencies/{currency}', 'Api\CurrencyController@get');
Route::post('/exchange', 'Api\CurrencyController@exchange');

