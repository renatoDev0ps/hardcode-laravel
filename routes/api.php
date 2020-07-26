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

Route::get('/pacients', 'PacientController@index');
Route::get('/pacients/{pacient}', 'PacientController@show')->name('pacients.show');
Route::post('/pacients', 'PacientController@store')->name('pacients.store');
Route::put('/pacients/{pacient}', 'PacientController@update')->name('pacients.update');
Route::delete('/pacients/{pacient}', 'PacientController@destroy')->name('pacients.destroy');
// Route::apiResource('/pacients', 'PacientController');

Route::get('/address', 'AddressController@index');
Route::get('/address/{address}', 'AddressController@show')->name('address.show');
Route::post('/address', 'AddressController@store')->name('address.store');
Route::put('/address/{address}', 'AddressController@update')->name('address.update');
Route::delete('/address/{address}', 'AddressController@destroy')->name('address.destroy');
// Route::apiResource('/address', 'AddressController');
