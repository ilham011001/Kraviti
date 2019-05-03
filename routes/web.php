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

Route::get('/', 'KravitiController@home');
Route::get('/product', 'KravitiController@product');
Route::get('/product/{product}', 'KravitiController@product_detail');
Route::get('/about', 'KravitiController@about');
Route::get('/faq', 'KravitiController@faq');
Route::get('/contact', 'KravitiController@contact');
Route::get('/category/{category}', 'KravitiController@category');
Route::post('/request', 'KravitiController@store_request');
Route::post('/contact', 'KravitiController@store_contact');


Route::get('/category_list','KravitiController@category_list');

Route::get('/data_product','KravitiController@data_product');
Route::get('/data_category/{id}', 'KravitiController@data_category');



Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {

	Route::get('/', 'HomeController@index')->name('home');    
	Route::get('/home', 'HomeController@index')->name('home');    


	/*  Contact */	
	Route::group(['prefix' => 'contact'], function() {
	    Route::get('/', 'ContactController@index');
	});

	/*  Banner */	
	Route::resource('banner','BannerController')->except([
		'show'
	]);

	/*  Hope */	
	Route::resource('hope','HopeController');		

	/*  About */	
	Route::resource('about','AboutController')->only([
		'index', 'edit', 'update'
	]);

	/*  Order */	
	Route::resource('order','OrderController')->only([
		'index', 'show', 'destroy'
	]);		

	/*  Category */	
	Route::resource('category','CategoryController');

	/*  Product */
	Route::resource('product','ProductController');

	/*  Faq */	
	Route::resource('faq', 'FaqController');
	Route::resource('faqAnswer', 'FaqAnswerController')->only([
		'store', 'destroy'
	]);

});

Auth::routes();
