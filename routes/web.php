<?php
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', 'HomeController@welcome');
Route::get('/home', 'AdminController@home');

Route::resource('restaurant', 'restaurantController');