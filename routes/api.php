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
    // users
    Route::post('details', 'API\UsersController@details');

    // recipes
    Route::post('new-recipes', 'API\RecipesController@new');
    Route::post('update-recipes', 'API\RecipesController@update');
    Route::delete('delete-recipes/{id}','API\RecipesController@deleteRecipes');

     // Category
     Route::post('new-category', 'API\CategoryController@new');
     Route::post('update-category', 'API\CategoryController@update');
     Route::delete('delete-category/{id}','API\CategoryController@deleteCategory');
});

// recipes
Route::post('find-all-recipes', 'API\RecipesController@findAll');
Route::get('find-one-recipes/{id}','API\RecipesController@findOneRecipe');

// Category 
Route::post('find-all-category', 'API\RecipesController@findAll');
Route::get('find-one-category/{id}','API\CategoryController@findOneCategory');
