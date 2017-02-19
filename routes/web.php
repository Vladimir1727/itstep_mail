<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('test', 'TestController@index');
Route::get('home', 'HomeController@index')->middleware('locale');
Route::get('/', 'HomeController@index')->middleware('locale');
Auth::routes();

Route::get('logout', 'HomeController@logout');

Route::get('/model', 'HomeController@model')->middleware('locale');
Route::group(['middleware'=>'auth'],function(){
	Route::resource('subscribers', 'SubscriberController');//добавляет группы роутеров для SubscriberController
	Route::get('subscriber/list', 'SubscriberController@index')->middleware('locale');
	Route::get('lists', 'ListController@index')->middleware('locale');
	Route::resource('lists','ListController');
	Route::post('language',array(
		'before'=>'csrf',
		'as'=>'language-chooser',
		'uses'=>'LanguageController@chooser'
		))->middleware('locale');
	Route::get('/send-email','SendController@form')->middleware('locale');
	Route::post('/send-email','SendController@send');
	Route::post('/lists/addsubscriber','ListController@addsubscriber');
	Route::post('/lists/delsubscriber','ListController@delsubscriber');
	Route::get('/settings','SendController@showsettings')->middleware('locale');
	Route::post('/setsettings','SendController@setsettings')->middleware('locale');
});


Route::group(['middleware'=>'locale'],function(){
	Route::resource('lists','ListController');
	Route::resource('subscribers','SubscriberController');
});