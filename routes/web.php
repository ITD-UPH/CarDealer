<?php

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

Route::get('/', 'CustomAuthController@loginPage')->name('loginv');
Route::get('/login', 'CustomAuthController@loginPage')->name('loginv');
Route::post('/login', 'CustomAuthController@login')->name('login');

Route::get('/register', 'CustomAuthController@registerPage')->name('registerv');
Route::post('/register', 'CustomAuthController@register')->name('register');

Route::get('/register/activate/{code}', 'CustomAuthController@activate')->name('activate');
Route::get('/logout', 'CustomAuthController@logout')->name('logout');

Route::get('/home', 'HomeController@homePage')->name('home');

//Route::resource('cars', 'CarController');
Route::resource('products/sales', 'SaleController');

Route::get('products/cars', 'CarController@index')->name('cars.index');
Route::get('products/cars/create', 'CarController@create')->name('cars.create');
Route::post('products/cars', 'CarController@store')->name('cars.store');
Route::get('products/cars/{car}/edit', 'CarController@edit')->name('cars.edit');
Route::patch('products/cars/{car}', 'CarController@update')->name('cars.update');
Route::get('products/cars/{car}', 'CarController@show')->name('cars.show');
Route::delete('products/cars/{car}', 'CarController@destroy')->name('cars.destroy');
Route::get('products/cars/datatables/json', 'CarController@json')->name('cars.json');

Route::get('products/sales', 'SaleController@index')->name('sales.index');
Route::get('products/sales/create', 'SaleController@create')->name('sales.create');
Route::post('products/sales', 'SaleController@store')->name('sales.store');
Route::get('products/sales/{sale}/edit', 'SaleController@edit')->name('sales.edit');
Route::patch('products/sales/{sale}', 'SaleController@update')->name('sales.update');
Route::get('products/sales/{sale}', 'SaleController@show')->name('sales.show');
Route::delete('products/sales/{sale}', 'SaleController@destroy')->name('sales.destroy');


