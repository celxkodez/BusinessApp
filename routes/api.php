<?php

use App\Http\Controllers;
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

Route::post('/register', 'api\AuthController@create');
Route::post('/login', 'api\AuthController@login');

Route::namespace('Api')->group(function ()
{
  Route::get('/users', 'UsersController@index');
  Route::get('/users/{user}', 'UsersController@show');
  Route::post('/users/{user}', 'UsersController@create');

});
