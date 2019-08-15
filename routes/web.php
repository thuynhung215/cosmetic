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

//Route::get('/', function () {
//    return view('pages.home');
//});

Route::get('/', 'MyController@index');
Route::get('/detail', 'MyController@detail')->name('detail');
Route::get('/login', 'MyController@login')->name('login');
Route::get('/signup', 'MyController@signup')->name('signup');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



//Route::get('/user', 'UserController@index')->name('users');
Route::resource('users', 'UserController');
Route::resource('categories', 'CategoryController');
Route::resource('products', 'ProductController');
Route::get('/edit','UserController@edit')->name('edit');
Route::get('destroy', 'UserController@destroy')->name('destroy');

//test get all products from one Cate
Route::get('cate/{id}', 'MyController@cate')->name('product-cate');
Route::get('/wishlist', 'WishlistController@index');
Route::POST('/addtowishlist', 'WishlistController@addWishlist');
