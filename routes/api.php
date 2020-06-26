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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('recipes','RecipesController@findAll');

// users
Route::post('login', 'API\UsersController@login');
Route::post('register', 'API\UsersController@register');

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('details', 'API\UsersController@details');
    Route::post('new-recipes', 'API\RecipesController@new');
    Route::put('update-recipes', 'API\RecipesController@update');
});


// recipes
Route::post('find-all-recipes', 'API\RecipesController@findAll');
