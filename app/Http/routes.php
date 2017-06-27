<?php
Route::get('', 'PagesController@page_home');
Route::get('about', 'PagesController@page_about');
Route::get('home', 'PagesController@page_home');
Route::get('login', 'PagesController@page_login');
Route::post('login', 'PagesController@login')->name('login');
Route::get('logout', 'PagesController@page_logout');
Route::get('register', 'PagesController@page_register');
Route::get('importdata', 'PagesController@page_importdata');
Route::post('getdatabases', 'PagesController@page_postdata');
Route::group(['prefix' => 'report'], function () {
	Route::get('', 'PagesController@page_report');
	// Route::get('/viewpost/{id}', 'PagesController@page_viewpost');
	Route::get('/viewpost/{id}',[
		'uses'=>'PagesController@page_viewpost',
		'as'=>'viewpost'
	]);
});
Route::get('/fileairmap/{req}/{res}/{next}', 'PagesController@page_file');
Route::get('/filewater/{req}/{res}/{next}', 'PagesController@page_file');
//router.get('/', (req, res, next) 
