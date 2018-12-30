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

// Route::get('/', function () {
//     return view('dashboard');
// });

//Route::post('login', 'LoginController@login');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'DashboardController@dashboard')->name('dashboard');

// inventry
Route::get('/inventory', 'InventoryController@index');
Route::get('/inventory/add', 'InventoryController@addItem');
Route::post('/inventory/add', 'InventoryController@addItem');
Route::get('/inventory/edit', 'InventoryController@editItem');
Route::post('/inventory/edit', 'InventoryController@editItem');

// user
Route::get('/user', 'UserController@index');
Route::get('/user/add', 'UserController@addUser');
Route::post('/user/add', 'UserController@addUser');
Route::get('/user/edit', 'UserController@editUser');
Route::post('/user/edit', 'UserController@editUser');
Route::post('/user/profile', 'UserController@editUserProfile');

// account
Route::get('/account', 'AccountController@index');
Route::get('/account/add', 'AccountController@addAccount');
Route::post('/account/add', 'AccountController@addAccount');
Route::get('/account/edit', 'AccountController@editAccount');
Route::post('/account/edit', 'AccountController@editAccount');

// companies
Route::get('/account/companies', 'AccountController@companies');
Route::get('/account/add-company', 'AccountController@addCompany');
Route::post('/account/add-company', 'AccountController@addCompany');
Route::get('/account/edit-company/{id}', 'AccountController@editCompany');
Route::post('/account/edit-company/{id}', 'AccountController@editCompany');

// companies
// Route::get('/account/companies', 'AccountController@companies');
Route::get('/account/add-warehouse/{companyId}', 'AccountController@addWarehouse');
Route::post('/account/add-warehouse/{companyId}', 'AccountController@addWarehouse');
Route::get('/account/edit-warehouse/{companyId}/{id}', 'AccountController@editWarehouse');
Route::post('/account/edit-warehouse/{companyId}/{id}', 'AccountController@editWarehouse');

Route::get('/account/{companyId}/warehouses/{wId}', 'AccountController@warehousesList');

// Tax
Route::get('/account/tax', 'TaxController@index');
Route::get('/account/add-tax', 'TaxController@addTax');
Route::post('/account/add-tax', 'TaxController@addTax');
Route::get('/account/edit-tax/{id}', 'TaxController@editTax');
Route::post('/account/edit-ax/{id}', 'TaxController@editTax');
