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

Route::get('merchant', function () {
    return view('forms.merchant');
});
Route::get('deliveryman', function () {
    return view('forms.deliveryman');
});

Auth::routes();

Route::middleware('auth')->group(function () {


    Route::get('/home', 'HomeController@index')->name('home');
///RUTAS PARA GESTIONAR LOS ROLES Y PERMISOS
    Route::get('roles', 'admin\RoleController@getRoles')->name('roles');
    Route::get('permissions/{id}', 'admin\RoleController@getPermissions')->name('permissions');
    Route::get('get-roles', 'admin\RoleController@index')->name('get-roles');
    Route::get('create-roles', 'admin\RoleController@create')->name('create-role');
    Route::post('store-role', 'admin\RoleController@store')->name('store-role');
    Route::get('edit-role/{id}', 'admin\RoleController@edit')->name('edit-role');
    Route::put('update-role/{id}', 'admin\RoleController@update')->name('update-role');
    Route::delete('delete-role/{id}', 'admin\RoleController@deleteRole')->name('delete-role');
    Route::put('deactivate-role', 'admin\RoleController@deactivateRole')->name('deactivate-role');


//RUTAS PARA LAS CATEGORIAS
    Route::get('categories/{id}', 'admin\CategoryController@getCategories')->name('categories');
    Route::get('get-category', 'admin\CategoryController@index')->name('get-category');
    Route::get('edit-category/{id}', 'admin\CategoryController@edit')->name('edit-category');
    Route::post('store-category', 'admin\CategoryController@store')->name('store-category');
    Route::put('update-category/{id}', 'admin\CategoryController@update')->name('update-category');
    Route::delete('delete-category/{id}', 'admin\CategoryController@update')->name('delete-category');
    Route::put('deactivate-category', 'admin\CategoryController@deactivate')->name('deactivate-category');


//RUTAS PARA LAS SUBCATEGORIAS
    Route::get('subcategories', 'admin\SubCategoryController@getCategories')->name('subcategories');
    Route::get('get-subcategory', 'admin\SubCategoryController@index')->name('get-subcategory');
    Route::get('edit-subcategory/{id}', 'admin\SubCategoryController@edit')->name('edit-subcategory');
    Route::post('store-subcategory', 'admin\SubCategoryController@store')->name('store-subcategory');
    Route::put('update-subcategory/{id}', 'admin\SubCategoryController@update')->name('update-subcategory');
    Route::delete('delete-subcategory/{id}', 'admin\SubCategoryController@update')->name('delete-subcategory');
    Route::put('deactivate-subcategory', 'admin\SubCategoryController@deactivate')->name('deactivate-subcategory');


//RUTAS PARA LOS PRODUCTOS
    Route::get('products/{id}', 'admin\ProductController@getProducts')->name('products');
    Route::get('create-product', 'admin\ProductController@create')->name('create-product');
    Route::get('get-product', 'admin\ProductController@index')->name('get-product');
    Route::get('edit-product/{id}', 'admin\ProductController@edit')->name('edit-product');
    Route::post('store-product', 'admin\ProductController@store')->name('store-product');
    Route::put('update-product/{id}', 'admin\ProductController@update')->name('update-product');
    Route::delete('delete-product/{id}', 'admin\ProductController@update')->name('delete-product');
    Route::put('deactivate-product', 'admin\ProductController@deactivate')->name('deactivate-product');
    Route::get('get-form-product/{id}', 'admin\ProductController@getForm')->name('get-form-product');


//RUTAS PARA LOS USUARIOS
    Route::get('users', 'admin\UserController@getUsers')->name('users');
    Route::get('create-user', 'admin\UserController@create')->name('create-user');
    Route::get('get-user', 'admin\UserController@index')->name('get-user');
    Route::get('edit-user/{id}', 'admin\UserController@edit')->name('edit-user');
    Route::post('store-user', 'admin\UserController@store')->name('store-user');
    Route::put('update-user/{id}', 'admin\UserController@update')->name('update-user');
    Route::delete('delete-user/{id}', 'admin\UserController@update')->name('delete-user');
    Route::put('deactivate-user', 'admin\UserController@deactivate')->name('deactivate-user');


//RUTAS PARA LAS SOLICITUDES DEL EMPRESARIO Y REPARTIDOR
    Route::get('create-merchant', 'RequestForm@createMerchant')->name('create-merchant');
    Route::get('create-deliveryman', 'RequestForm@createdeliveryMan')->name('create-deliveryman');
    Route::post('store-merchant', 'RequestForm@storeMarchant')->name('store-merchant');
    Route::post('store-deliveryman', 'RequestForm@storeDeliveryMan')->name('store-deliveryman');

//RUTAS PARA LOS EMPRESARIOS
    Route::get('get-request-merchants', 'admin\MerchantController@getRequestMerchants')->name('get-request-merchants');
    Route::get('show-request-merchants/{id}', 'admin\MerchantController@showRequest')->name('show-request-merchants');
    Route::post('store-request-merchants/{id}', 'admin\MerchantController@store')->name('store-request-merchants');
    Route::get('get-merchants', 'admin\MerchantController@index')->name('get-merchants');
    Route::get('create-merchant-profile/{id}', 'admin\MerchantController@createProfile')->name('create-merchant-profile');

//RUTAS PARA LAS COMPANIAS
    Route::get('edit-company-merchant/{id}', 'admin\CompanyController@edit')->name('edit-company-merchant');
    Route::put('update-company-merchant/{id}', 'admin\CompanyController@update')->name('update-company-merchant');
    Route::get('get-table-companies/{id}', 'admin\CompanyController@getCompanies')->name('get-table-companies');
    Route::put('deactivate-company-merchant', 'admin\CompanyController@deactivate')->name('deactivate-company-merchant');

//RUTAS PARA LOS REPARTIDORES
    Route::get('get-request-deliverymen', 'admin\DeliveryManController@getRequestDeliveryMen')->name('get-request-deliverymen');
    Route::get('show-request-delivery/{id}', 'admin\DeliveryManController@showRequest')->name('show-request-delivery');
    Route::post('store-request-delivery/{id}', 'admin\DeliveryManController@store')->name('store-request-delivery');
    Route::get('get-deliverymen', 'admin\DeliveryManController@index')->name('get-deliverymen');


//RUTAS PARA LAS TIPOS DE EMPRESAS
    Route::get('companies', 'admin\CompanyTypeController@getCompanies')->name('companies');
    Route::get('get-company', 'admin\CompanyTypeController@index')->name('get-company');
    Route::get('edit-company/{id}', 'admin\CompanyTypeController@edit')->name('edit-company');
    Route::post('store-company', 'admin\CompanyTypeController@store')->name('store-company');
    Route::put('update-company/{id}', 'admin\CompanyTypeController@update')->name('update-company');
    Route::delete('delete-company/{id}', 'admin\CompanyTypeController@update')->name('delete-company');
    Route::put('deactivate-company', 'admin\CompanyTypeController@deactivate')->name('deactivate-company');


//RUTAS PARA LAS TIPOS DE VEHICULOS
    Route::get('vehicles', 'admin\VehicleTypeController@getVehicles')->name('vehicles');
    Route::get('get-vehicle', 'admin\VehicleTypeController@index')->name('get-vehicle');
    Route::get('edit-vehicle/{id}', 'admin\VehicleTypeController@edit')->name('edit-vehicle');
    Route::post('store-vehicle', 'admin\VehicleTypeController@store')->name('store-vehicle');
    Route::put('update-vehicle/{id}', 'admin\VehicleTypeController@update')->name('update-vehicle');
    Route::delete('delete-vehicle/{id}', 'admin\VehicleTypeController@update')->name('delete-vehicle');
    Route::put('deactivate-vehicle', 'admin\VehicleTypeController@deactivate')->name('deactivate-vehicle');
});