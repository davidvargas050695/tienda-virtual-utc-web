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


//RUTAS PARA LAS CATEGORIAS
Route::get('api-categories','admin\CategoryController@getApiCategories')->name('api-categories');

//RUTAS PARA LAS SUBCATEGORIAS
Route::get('api-subcategories','admin\SubCategoryController@getApiCategories')->name('api-subcategories');

//RUTAS PARA LOS PRODUCTOS
Route::get('api-products','admin\ProductController@getApiProducts')->name('api-products');

//RUTAS PARA LOS USUARIOS
Route::get('api-users','admin\UserController@getApiUsers')->name('api-users');

