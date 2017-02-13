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

/*Route::get('/', function () {
    return view('welcome');
});*/

/*Route::get('users/{id}', function ($id) {
	//передача данных через адрес
    return $id;
});*/

/*Route::group(array('prefix'=>'users'), function () {
	Route::get('/{id}', function ($id){
    return $id;
	});
});*/
Route::get('test', 'TestController@index');
Route::get('home', 'HomeController@index')->middleware('locale');
Route::get('/', 'HomeController@index')->middleware('locale');
Auth::routes();

Route::get('logout', 'HomeController@logout')->middleware('locale');

Route::get('/model', 'HomeController@model')->middleware('locale');
Route::group(['middleware'=>'auth'],function(){
	Route::resource('subscribers', 'SubscriberController');//добавляет группы роутеров для SubscriberController
	Route::get('subscriber/list', 'SubscriberController@lists')->middleware('locale');
	Route::get('lists', 'ListController@index')->middleware('locale');
	Route::resource('lists','ListController');
	Route::post('language',array(
		'before'=>'csrf',
		'as'=>'language-chooser',
		'uses'=>'LanguageController@chooser'
		))->middleware('locale');
	Route::get('/send-email','SendController@form');
	Route::post('/send-email','SendController@send');
});


Route::group(['middleware'=>'locale'],function(){
	Route::resource('lists','ListController');
	Route::resource('subscribers','SubscriberController');
});