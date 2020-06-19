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

//Routes to access different methods of PagesController to display pages(index, about & services)
Route::get('/','PagesController@index');
Route::get('/about','PagesController@about');
Route::get('/services','PagesController@services');

//All routes to access different methods of ReviewsController
Route::resource('reviews','ReviewsController');

//All routes to access different methods of BooksController
Route::resource('books','BooksController');

//All routes for authentication
Auth::routes();

//Route to access dashboard through DashboardController
Route::get('/dashboard', 'DashboardController@index');
