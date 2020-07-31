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
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/




Route::post('login','api\AuthController@login');
Route::post('register','api\AuthController@register');
Route::get('logout','api\AuthController@logout');
Route::post('save-profile-user','api\AuthController@profileUser')->name('save-profile-user')->middleware('jwtAuth');

//RUTAS PARA LAS typos de epmresa
Route::get('api-companies-type','admin\CompanyTypeController@getApiCompanies')->name('api-companies-type')->middleware('jwtAuth');

//RUTAS PARA LAS epmresas
Route::get('api-companies/{id}','admin\CompanyController@getApiCompanies')->name('api-companies')->middleware('jwtAuth');

//RUTAS PARA LAS CATEGORIAS
Route::get('api-categories/{id}','admin\CategoryController@getApiCategories')->name('api-categories')->middleware('jwtAuth');


//RUTAS PARA LOS PRODUCTOS
Route::get('api-products/{id}','admin\ProductController@getApiProducts')->name('api-products');

//RUTAS PARA LOS USUARIOS
Route::get('api-users','admin\UserController@getApiUsers')->name('api-users');
//RUTAS PARA LAS ORDENES
Route::post('api-send-order','admin\OrderController@store')->name('api-send-order')->middleware('jwtAuth');;

