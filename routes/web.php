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
