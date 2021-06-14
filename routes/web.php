<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', 'HomeController@welcome');
Route::get('/home', 'AdminController@home');

Route::resource('menu', 'MenuController');

Route::get('order', 'OrderController@index');
Route::post('order/{id}', 'OrderController@pesan');
Route::delete('order/{id}', 'OrderController@delete');
Route::get('order/checkout', 'OrderController@checkout');
Route::get('order/running', 'OrderController@running');
Route::get('order/done', 'OrderController@done');
Route::get('order/payment/{id}', 'OrderController@payment');
Route::get('order/show/{id}', 'OrderController@show');

Route::get('listrik', 'ListrikController@index')->name('listrik.index');
Route::get('listrik/create', 'ListrikController@create');
Route::post('listrik/create', 'ListrikController@store')->name('listrik.store');
Route::get('listrik/detail/{id}', 'ListrikController@detail')->name('listrik.detail');
Route::get('listrik/update/{id}', 'ListrikController@updateStatus')->name('listrik.update');

Route::get('laundry', 'LaundryController@index')->name('laundry.index');
Route::get('laundry/create', 'LaundryController@create');
Route::post('laundry/create', 'LaundryController@store')->name('laundry.store');
Route::get('laundry/detail/{id}', 'LaundryController@detail')->name('laundry.detail');
Route::get('laundry/edit/{id}', 'LaundryController@edit')->name('laundry.edit');
Route::post('laundry/update/{id}', 'LaundryController@update')->name('laundry.update');
Route::get('laundry/update/{id}', 'LaundryController@updateStatus')->name('laundry.updateStatus');

Route::get('admin', 'AdminController@index')->name('admin.index');
Route::get('admin/create', 'AdminController@create')->name('admin.create');
Route::post('admin/create', 'AdminController@store')->name('admin.store');
Route::get('admin/detail/{id}', 'AdminController@detail')->name('admin.detail');
Route::get('admin/edit/{id}', 'AdminController@edit')->name('admin.edit');
Route::post('admin/update/{id}', 'AdminController@update')->name('admin.update');
Route::get('admin/update/{id}', 'AdminController@updateStatus')->name('admin.updateStatus');

Route::get('/profile', 'UserController@show');
Route::get('/profile/{id}/edit', 'UserController@editProfile');
Route::post('/profile/{id}/update', 'UserController@updateProfile');