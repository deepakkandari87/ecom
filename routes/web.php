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

// user
Route::get('/account', 'AccountController@index');
Route::get('/account/add', 'AccountController@addAccount');
Route::post('/account/add', 'AccountController@addAccount');
Route::get('/account/edit', 'AccountController@editAccount');
Route::post('/account/edit', 'AccountController@editAccount');

//channels
Route::get('/channel', 'ChannelController@index');
Route::get('/channel/add', 'ChannelController@addChannel');
Route::post('/channel/add', 'ChannelController@addChannel');

//Admin channels
Route::get('/admin-channel', 'AdminchannelController@index');
Route::post('/admin-channel/add', 'AdminchannelController@addChannel');
Route::get('/admin-channel/add', 'AdminchannelController@addChannel');
Route::get('/admin-channel/edit/{id}', 'AdminchannelController@editChannel');
Route::post('/admin-channel/edit/{id}', 'AdminchannelController@editChannel');




