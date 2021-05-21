<?php
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', 'HomeController@welcome');
Route::get('/home', 'AdminController@home');

Route::resource('restaurant', 'RestaurantController');
Route::resource('menu', 'MenuController');

Route::get('order', 'OrderController@index');
Route::post('order/{id}', 'OrderController@pesan');
Route::delete('order/{id}', 'OrderController@delete');
Route::get('checkout', 'OrderController@checkout');