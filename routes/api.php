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

//API
    //Route::post('/scan','Data\Table\Api\ApiController@scan');
    Route::post('/verifikasi/{id}','Data\Table\Api\ApiController@verifikasi');
    //Route::get('/data_antri/verifikasi/{data}', 'Data\Table\Api\ApiController@verifikasiview')->name('api.data_antri.verifikasi');
//---------------------------------------------------------

