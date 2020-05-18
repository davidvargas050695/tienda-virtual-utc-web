<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//RUTAS PARA LAS CATEGORIAS
Route::get('categories','admin\CategoryController@getCategories')->name('categories');
Route::get('get-category','admin\CategoryController@index')->name('get-category');
Route::get('edit-category/{id}','admin\CategoryController@edit')->name('edit-category');
Route::post('store-category','admin\CategoryController@store')->name('store-category');
Route::put('update-category/{id}','admin\CategoryController@update')->name('update-category');
Route::delete('delete-category/{id}','admin\CategoryController@update')->name('delete-category');
Route::put('deactivate-category','admin\CategoryController@deactivate')->name('deactivate-category');


//RUTAS PARA LAS SUBCATEGORIAS
Route::get('subcategories','admin\SubCategoryController@getCategories')->name('subcategories');
Route::get('get-subcategory','admin\SubCategoryController@index')->name('get-subcategory');
Route::get('edit-subcategory/{id}','admin\SubCategoryController@edit')->name('edit-subcategory');
Route::post('store-subcategory','admin\SubCategoryController@store')->name('store-subcategory');
Route::put('update-subcategory/{id}','admin\SubCategoryController@update')->name('update-subcategory');
Route::delete('delete-subcategory/{id}','admin\SubCategoryController@update')->name('delete-subcategory');
Route::put('deactivate-subcategory','admin\SubCategoryController@deactivate')->name('deactivate-subcategory');


//RUTAS PARA LOS PRODUCTOS
Route::get('products','admin\ProductController@getProducts')->name('products');
Route::get('create-product','admin\ProductController@create')->name('create-product');
Route::get('get-product','admin\ProductController@index')->name('get-product');
Route::get('edit-product/{id}','admin\ProductController@edit')->name('edit-product');
Route::post('store-product','admin\ProductController@store')->name('store-product');
Route::put('update-product/{id}','admin\ProductController@update')->name('update-product');
Route::delete('delete-product/{id}','admin\ProductController@update')->name('delete-product');
Route::put('deactivate-product','admin\ProductController@deactivate')->name('deactivate-product');
