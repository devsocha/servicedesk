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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('request/show/{id}','App\Http\Controllers\api\RequestController@show');
Route::post('request/store','App\Http\Controllers\api\RequestController@store');
Route::get('requests/show/all','App\Http\Controllers\api\RequestController@index');
