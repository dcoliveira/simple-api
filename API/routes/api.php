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

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */


/**
 * 
 * Rotas destinadas aos tratamentos de usuários do sistema 
 *
 */
Route::post('login', 'AuthController@login');

Route::get("user", "UserController@index");
Route::get("user/{id}", "UserController@show");
Route::post("user", "UserController@store");
Route::put('user/{id}',"UserController@update");
Route::delete('user/{id}',"UserController@delete");
Route::post('user-restore/{id}',"UserController@restore");