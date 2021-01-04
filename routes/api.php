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
Route::post('/store', ['uses'=> 'App\Http\Controllers\BacotController@store']);
Route::get('/show', ['uses'=> 'App\Http\Controllers\BacotController@show']);
Route::get('/detail/{id}', ['uses'=> 'App\Http\Controllers\BacotController@detail']);
Route::get('/province', ['uses'=> 'App\Http\Controllers\ProvinceController@get']);
Route::get('/regencies/{id}', ['uses'=> 'App\Http\Controllers\RegenciesController@show']);