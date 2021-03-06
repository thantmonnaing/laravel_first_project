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

// Route::get('/', 'MainController@welcome' )->name('homepage');

// Route::get('testing', 'MainController@testing')->name('testing');

// Route::get('about', 'MainController@about')->name('aboutpage');

// Route::get('contact', 'MainController@contact')->name('contactpage');

Route::middleware('role:admin')->group(function (){
	
Route::resource('brand', 'BrandController'); // 7	(get, post, put, delete)

Route::resource('category', 'CategoryController');

Route::resource('subcategory', 'SubcategoryController');

Route::resource('item', 'ItemController');

Route::resource('order', 'OrderController');

Route::post('filter', 'ItemController@filterCategory')->name('filterCategory');

});

Route::post('confirm/{id}', 'OrderController@confirm')->name('order.confirm');

Route::get('/ordersuccess', 'OrderController@ordersuccess')->name('ordersuccess');



//frontend
Route::get('/', 'FrontendController@home')->name('mainpage');

Route::get('signin', 'FrontendController@signin')->name('signin');

Route::get('signup', 'FrontendController@signup')->name('signup');

Route::get('itemdetail/{id}', 'FrontendController@itemdetail')->name('itemdetail');

Route::get('cart', 'FrontendController@cart')->name('cart');

Route::get('itemsbysubcategory/{id}', 'FrontendController@itemsbysubcategory')->name('itemsbysubcategory');

Route::get('itemsbybrand/{id}', 'FrontendController@itemsbybrand')->name('itemsbybrand');

//user

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('user', 'UserController');

