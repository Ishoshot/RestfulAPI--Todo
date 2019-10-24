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

// add/edit/remove/list

//All Todos
Route::get('/todos', 'TodosController@index');

//Add New Todo
Route::post('/todo', 'TodosController@store');

//Update Todo
Route::put('/todo/update', 'TodosController@update');

//Delete Todo
Route::delete('/todo/{id}', 'TodosController@destroy');